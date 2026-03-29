<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPaper extends Model
{
    use HasFactory;

    protected $fillable = ['study_year_id', 'title', 'file_path', 'status'];

    public function year()
    {
        return $this->belongsTo(StudyYear::class, 'study_year_id');
    }
}