<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AnnouncementPopup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_active',
        'image_path',
        'redirect_url',
        'trigger_type',
        'trigger_value',
    ];

    /**
     * Get the full URL for the image.
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::url($this->image_path) : null;
    }
}
