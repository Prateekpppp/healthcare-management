<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('latest', function ($query) {
            $query->orderBy('id', 'desc');
        });
    }
}