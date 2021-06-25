<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'total-price',
        'booking-start-date',
        'status',
        'quantity',
        'tour-id',
        'account-id',
    ];
}
