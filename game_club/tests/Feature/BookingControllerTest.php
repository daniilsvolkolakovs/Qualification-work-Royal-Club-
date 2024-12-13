<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Computer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $manager;
    protected $computer;
    protected $booking;

    protected function setUp(): void
    {
        parent::setUp();

        // Creating users
        $this->user = User::factory()->create(['usertype' => 'user']);
        $this->manager = User::factory()->create(['usertype' => 'manager']);

        // Creating a computer
        $this->computer = Computer::create([
            'name' => 'Test Computer',
            'price' => 500,
            'quantity' => 10,
            'computer_id' => uniqid('PC_'),
        ]);

        // Creating a booking
        $this->booking = Booking::create([
            'user_id' => $this->user->id,
            'computer_id' => $this->computer->id,
            'start_time' => Carbon::now()->addHours(2),
            'end_time' => Carbon::now()->addHours(3),
        ]);

        $this->actingAs($this->manager);
    }

    // Test to check if a manager can edit a booking
    public function test_manager_can_edit_booking()
    {
        $response = $this->get(route('manager.bookings.edit', ['booking' => $this->booking->id]));

        $response->assertStatus(200);
    }

    // Test to check if a manager can update a booking with valid data
    public function test_manager_can_update_booking_with_valid_data()
    {
        $newStartTime = Carbon::now()->addHours(4);
        $newEndTime = Carbon::now()->addHours(5);

        $response = $this->put(route('manager.bookings.update', ['booking' => $this->booking->id]), [
            'start_time' => $newStartTime,
            'end_time' => $newEndTime,
        ]);

        $response->assertRedirect(route('services'));
        $this->assertDatabaseHas('bookings', [
            'id' => $this->booking->id,
            'start_time' => $newStartTime,
            'end_time' => $newEndTime,
        ]);
    }

    // Test to check if a manager cannot update a booking with invalid data
    public function test_manager_cannot_update_booking_with_invalid_data()
    {
        $response = $this->put(route('manager.bookings.update', ['booking' => $this->booking->id]), [
            'start_time' => '',
            'end_time' => '',
        ]);

        $response->assertSessionHasErrors(['start_time', 'end_time']);
    }

    // Test to check if a manager can delete a booking
    public function test_manager_can_delete_booking()
    {
        $response = $this->delete(route('manager.bookings.destroy', ['booking' => $this->booking->id]));

        $response->assertRedirect(route('services', [
            'sort' => 'bookings.id',
            'order' => 'asc',
            'search' => ''
        ]));
        
        $this->assertDatabaseMissing('bookings', [
            'id' => $this->booking->id,
        ]);
    }

    // Test to check if a user cannot create a booking when the end time is before the start time
    public function test_user_cannot_create_booking_if_end_time_is_before_start_time()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('bookings.store'), [
            'computer_id' => $this->computer->id,
            'start_time' => Carbon::now()->addHours(3),
            'end_time' => Carbon::now()->addHours(2),
        ]);

        $response->assertSessionHasErrors(['end_time']);
    }

    // Test to check if a user cannot create a booking with a past time
    public function test_user_cannot_create_booking_with_past_time()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('bookings.store'), [
            'computer_id' => $this->computer->id,
            'start_time' => Carbon::now()->subDay(),
            'end_time' => Carbon::now()->subDay()->addHour(),
        ]);

        $response->assertSessionHasErrors(['start_time']);
    }

    public function test_user_cannot_create_booking_outside_working_hours_on_weekdays()
    {
        $response = $this->actingAs($this->user)->post(route('bookings.pay'), [
            'computer_id' => $this->computer->id,
            'start_time' => Carbon::now()->nextWeekday()->setHour(8)->setMinute(0)->format('Y-m-d H:i:s'),
            'end_time' => Carbon::now()->nextWeekday()->setHour(10)->setMinute(0)->format('Y-m-d H:i:s'),
        ]);

        $response->assertSessionHasErrors(['start_time']);
    }

    public function test_user_cannot_create_booking_outside_working_hours_on_weekends()
    {
        $response = $this->actingAs($this->user)->post(route('bookings.pay'), [
            'computer_id' => $this->computer->id,
            'start_time' => Carbon::now()->nextWeekendDay()->setHour(11)->setMinute(0)->format('Y-m-d H:i:s'),
            'end_time' => Carbon::now()->nextWeekendDay()->setHour(13)->setMinute(0)->format('Y-m-d H:i:s'),
        ]);

        $response->assertSessionHasErrors(['start_time']);
    }
}