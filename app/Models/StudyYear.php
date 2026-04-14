<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyYear extends Model
{
    use HasFactory;

    protected $fillable = ['study_class_id', 'year', 'status'];

    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class, 'study_class_id');
    }

    public function studyPapers()
    {
        return $this->hasMany(StudyPaper::class);
    }
}