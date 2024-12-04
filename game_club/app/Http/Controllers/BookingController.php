<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Computer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Jobs\DeletePendingBooking;

class BookingController extends Controller
{
    public function showServices(Request $request)
    {

        if (!auth()->check()) {
            return view('services', [
                'computers' => [],
                'bookings' => [],
                'sortField' => null,
                'sortOrder' => null,
                'isGuest' => true,
            ]);
        }


        $sortField = $request->input('sort', 'bookings.id');
        $sortOrder = $request->input('order', 'asc');
        $computers = Computer::all();

        // Query for bookings
        $bookingsQuery = Booking::join('computers', 'bookings.computer_id', '=', 'computers.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'computers.name as computer_name', 'users.name as user_name');

        if (auth()->user()->usertype === 'manager') {
            if ($request->has('search') && $request->input('search') !== '') {
                $search = $request->input('search');
                $bookingsQuery->where(function ($query) use ($search) {
                    $query->where('computers.name', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                });
            }
            $bookings = $bookingsQuery->orderBy($sortField, $sortOrder)->get();
        } else {
            $bookings = $bookingsQuery->where('bookings.user_id', auth()->id())
                ->orderBy($sortField, $sortOrder)
                ->get();
        }

        return view('services', compact('computers', 'bookings', 'sortField', 'sortOrder'));
    }

    // Check computer availability
    public function checkAvailability(Request $request)
    {
        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);

        // Find available computers
        $availableComputers = Computer::whereDoesntHave('bookings', function ($query) use ($startTime, $endTime) {
            $query->whereBetween('start_time', [$startTime, $endTime])
                  ->orWhereBetween('end_time', [$startTime, $endTime])
                  ->orWhere(function ($query) use ($startTime, $endTime) {
                      $query->where('start_time', '<=', $startTime)
                            ->where('end_time', '>=', $endTime);
                  });
        })->get();

        return response()->json($availableComputers);
    }

    // Book a computer
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);

        $computer = Computer::findOrFail($request->computer_id);

        // Check availability
        if ($computer->bookings()->whereBetween('start_time', [$startTime, $endTime])->exists() ||
            $computer->bookings()->whereBetween('end_time', [$startTime, $endTime])->exists()) {
            return back()->with('error', 'This computer is booked at the selected time.');
        }

        // Create the booking
        Booking::create([
            'user_id' => auth()->id(),
            'computer_id' => $request->computer_id,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        return back()->with('success', 'The computer has been successfully booked!');
    }

    // Display all bookings for the manager
    public function index()
    {
        // If the user is a manager, pass all bookings to the services view
        $bookings = [];
        if (auth()->user()->usertype === 'manager') {
            $bookings = Booking::with('computer', 'user')->get();
        }

        return view('services', compact('bookings'));
    }

    // Edit booking time
    public function edit($id)
    {
        // Check if the user is a manager
        if (auth()->user()->usertype !== 'manager') {
            return redirect('/home');
        }

        $booking = Booking::findOrFail($id);
        $computers = Computer::all();
        return view('manager.edit_booking', compact('booking', 'computers'));
    }

    // Update booking details
    public function update(Request $request, $id)
    {
        // Validate the data
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Find the booking
        $booking = Booking::findOrFail($id);

        // Check if the booking exists
        if (!$booking) {
            return redirect()->route('services')->with('error', __('messages.booking_not_found'));
        }

        // Update the booking details
        $booking->start_time = Carbon::parse($request->start_time);
        $booking->end_time = Carbon::parse($request->end_time);
        $booking->save(); // Save the changes to the database

        // Redirect with success message to the services page
        return redirect()->route('services')->with('success', __('messages.booking_updated_successfully'));
    }

    // Delete booking
    public function destroy($id, Request $request)
    {
        // Check if the user is a manager
        if (auth()->user()->usertype !== 'manager') {
            return redirect('/home');
        }

        // Find and delete the booking
        $booking = Booking::findOrFail($id);
        $booking->delete();

        // Redirect back with sorting and search parameters
        return redirect()->route('services', [
            'sort' => $request->input('sort', 'bookings.id'),
            'order' => $request->input('order', 'asc'),
            'search' => $request->input('search', '')
        ])->with('success', __('messages.booking_deleted'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);

        $computer = Computer::findOrFail($request->computer_id);

        if ($computer->bookings()->whereBetween('start_time', [$startTime, $endTime])->exists() ||
            $computer->bookings()->whereBetween('end_time', [$startTime, $endTime])->exists()) {
            return back()->with('error', 'This computer is booked at the selected time.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = 500; 
        $description = "Booking for Computer {$computer->name}";

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $description,
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('bookings.confirm') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => url()->previous(),
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'computer_id' => $computer->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'payment_status' => 'pending',
        ]);

        DeletePendingBooking::dispatch($booking->id)->delay(now()->addMinute());

        return redirect($session->url);
    }

    public function confirmPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $sessionId = $request->query('session_id');
        $session = StripeSession::retrieve($sessionId);

        $booking = Booking::where('user_id', auth()->id())
            ->where('payment_status', 'pending')
            ->latest()
            ->first();

        if ($session->payment_status === 'paid') {
            $booking->update([
                'payment_status' => 'paid',
                'payment_id' => $session->id,
            ]);

            return redirect()->route('services')->with('success', __('messages.payment_paid'));
        }

        $booking->update(['payment_status' => 'failed']);
        return redirect()->route('services')->with('error', __('messages.payment_failed'));
    }
}