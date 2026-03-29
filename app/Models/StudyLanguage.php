<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyLanguage extends Model
{
    use HasFactory;

    protected $fillable = ['study_class_id', 'name', 'icon', 'status'];

    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class);
    }

    public function years()
    {
        return $this->hasMany(StudyYear::class);
    }
}