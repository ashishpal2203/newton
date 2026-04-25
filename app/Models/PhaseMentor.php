<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhaseMentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'phase_slider_id',
        'name',
        'title',
        'image',
        'sort_order'
    ];

    public function phaseSlider()
    {
        return $this->belongsTo(PhaseSlider::class);
    }
}
