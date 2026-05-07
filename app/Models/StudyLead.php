<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyLead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'class',
        'stream',
    ];
}
