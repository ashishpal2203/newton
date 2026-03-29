<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
        'link',
        'published_date',
        'read_time',
        'status',
        'sort_order',
    ];
}
