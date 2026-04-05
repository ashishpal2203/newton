<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon', 'status'];

    public function languages()
    {
        return $this->hasMany(StudyLanguage::class);
    }
}