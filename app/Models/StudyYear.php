<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyYear extends Model
{
    use HasFactory;

    protected $fillable = ['study_language_id', 'year', 'status'];

    public function language()
    {
        return $this->belongsTo(StudyLanguage::class, 'study_language_id');
    }

    public function papers()
    {
        return $this->hasMany(StudyPaper::class);
    }
}