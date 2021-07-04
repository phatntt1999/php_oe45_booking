<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat-name',
    ];
    public function tours()
    {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
