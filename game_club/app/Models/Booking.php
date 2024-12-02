<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'computer_id',
        'start_time',
        'end_time',
        'payment_status',
        'payment_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }

    public static function deleteExpiredBookings()
    {
        self::where('end_time', '<', Carbon::now())->delete();
    }
}
