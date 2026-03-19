<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'key',
        'value',
        'type'
    ];

    public function getValueAttribute($value)
    {
        if ($this->type === 'collection') {
            return json_decode($value, true) ?: [];
        }
        return $value;
    }
}
