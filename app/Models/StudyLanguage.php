<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyLanguage extends Model
{
    use HasFactory;

    protected $fillable = ['study_class_id', 'name', 'slug', 'icon', 'status'];

    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class);
    }

    public function studyYears()
    {
        return $this->hasMany(StudyYear::class);
    }
}