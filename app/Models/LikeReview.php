<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'account_id',
        'like_status',
    ];
}
