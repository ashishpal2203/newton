<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'subtitle',
        'user_image',
        'rating',
        'content',
        'status',
        'sort_order',
    ];
}
