<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Computer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_services_page_without_bookings_or_computers()
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertViewHas('computers', []);
        $response->assertViewHas('bookings', []);
        $response->assertViewHas('isGuest', true);
    }

    /** @test */
    public function authenticated_user_can_view_services_page_with_bookings_and_computers()
    {
        $user = User::factory()->create();
        $computer = Computer::factory()->create();
        $booking = Booking::factory()->create(['user_id' => $user->id, 'computer_id' => $computer->id]);

        $this->actingAs($user);
        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertViewHas('computers', function ($computers) use ($computer) {
            return $computers->contains($computer);
        });
        $response->assertViewHas('bookings', function ($bookings) use ($booking) {
            return $bookings->contains($booking);
        });
    }

    /** @test */
    public function manager_can_search_and_sort_bookings()
    {
        $manager = User::factory()->create(['usertype' => 'manager']);
        Booking::factory(10)->create();

        $this->actingAs($manager);
        $response = $this->get('/services?search=test&sort=computers.name&order=asc');

        $response->assertStatus(200);
        $response->assertViewHas('bookings');
    }

    /** @test */
    public function it_checks_availability_of_computers()
    {
        $computer = Computer::factory()->create();
        Booking::factory()->create([
            'computer_id' => $computer->id,
            'start_time' => Carbon::now()->addHour(),
            'end_time' => Carbon::now()->addHours(2),
        ]);

        $response = $this->postJson('/api/check-availability', [
            'start_time' => Carbon::now()->addHours(3),
            'end_time' => Carbon::now()->addHours(4),
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => $computer->id]);
    }

    /** @test */
    public function it_prevents_double_booking_for_same_time()
    {
        $user = User::factory()->create();
        $computer = Computer::factory()->create();
        Booking::factory()->create([
            'computer_id' => $computer->id,
            'start_time' => Carbon::now()->addHour(),
            'end_time' => Carbon::now()->addHours(2),
        ]);

        $this->actingAs($user);
        $response = $this->post('/bookings', [
            'computer_id' => $computer->id,
            'start_time' => Carbon::now()->addHour(),
            'end_time' => Carbon::now()->addHours(2),
        ]);

        $response->assertSessionHas('error');
    }

    /** @test */
    public function user_can_create_booking()
    {
        $user = User::factory()->create();
        $computer = Computer::factory()->create();

        $this->actingAs($user);
        $response = $this->post('/bookings', [
            'computer_id' => $computer->id,
            'start_time' => Carbon::now()->addHour(),
            'end_time' => Carbon::now()->addHours(2),
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'computer_id' => $computer->id,
        ]);
    }

    /** @test */
    public function it_processes_successful_payment()
    {
        Queue::fake();
        $user = User::factory()->create();
        $computer = Computer::factory()->create(['price' => 100]);

        $this->actingAs($user);
        $response = $this->post('/pay', [
            'computer_id' => $computer->id,
            'start_time' => Carbon::now()->addHour(),
            'end_time' => Carbon::now()->addHours(2),
        ]);

        $response->assertRedirect();
        Queue::assertPushed(DeletePendingBooking::class);
    }

    /** @test */
    public function it_handles_payment_confirmation()
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create(['user_id' => $user->id, 'payment_status' => 'pending']);

        $this->actingAs($user);
        $response = $this->get('/bookings/confirm?session_id=test_session');

        $response->assertRedirect('/services');
        $this->assertEquals('paid', $booking->refresh()->payment_status);
    }
}