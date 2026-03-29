<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_category_id', 'title', 'slug', 'image',
        'short_description', 'content', 'author_name',
        'tags', 'published_at', 'status'
    ];

    protected $casts = [
        'published_at' => 'date'
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
