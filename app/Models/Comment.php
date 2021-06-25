<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'object-type',
        'object-id',
        'account-id',
        'content',
        'comment-parent-id',
    ];
}
