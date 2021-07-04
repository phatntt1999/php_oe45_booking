<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    use HasFactory;

    protected $table = 'booking_tours';

    protected $fillable = [
        'total_price',
        'booking_start_date',
        'status',
        'quantity',
        'duration',
        'tour_id',
        'account_id',
    ];
}
