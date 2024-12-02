<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class RemovePastBookings extends Command
{
    protected $signature = 'bookings:remove-past';
    protected $description = 'Deletes bookings with past end dates';

    public function handle()
    {
        $count = Booking::where('end_time', '<', Carbon::now())->delete();
        $this->info("$count past bookings have been deleted.");
    }
}