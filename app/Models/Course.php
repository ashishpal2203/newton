<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'banner', 'about_title', 'about_text',
        'info_boxes', 'program_details', 'highlights',
        'home_icon', 'home_subtitle', 'home_color', 'is_featured'
    ];

    protected $casts = [
        'info_boxes' => 'array',
        'program_details' => 'array',
        'highlights' => 'array',
        'is_featured' => 'boolean'
    ];
}
