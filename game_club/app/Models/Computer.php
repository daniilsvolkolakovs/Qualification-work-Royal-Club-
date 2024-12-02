<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'computer_id',
    ];

    public $timestamps = true;

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}