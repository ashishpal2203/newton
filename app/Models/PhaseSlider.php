<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhaseSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'title',
        'link_text',
        'link_url',
        'description',
        'button_text',
        'button_url',
        'status',
        'sort_order'
    ];

    public function mentors()
    {
        return $this->hasMany(PhaseMentor::class)->orderBy('sort_order', 'asc');
    }
}
