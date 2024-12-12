<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'computer_id' => Computer::factory(),
            'start_time' => Carbon::now()->addHour(),
            'end_time' => Carbon::now()->addHours(2),
            'payment_status' => 'pending',
        ];
    }
}