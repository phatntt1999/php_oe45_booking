<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_review extends Model
{
    use HasFactory;

    protected $fillable = [
        'review-id',
        'account-id',
        'like-status',
    ];
}
