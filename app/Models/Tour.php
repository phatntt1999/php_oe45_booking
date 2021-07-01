<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'name',
        'description',
        'duration',
        'num_of_participants',
        'cat_tour_id',
        'rating',
        'price',
    ];
}
