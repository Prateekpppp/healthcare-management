<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    protected $fillable = [
        'name',
        'dosage',
        'price',
        'dosage_unit',
        'manufacturer',
        'image',
        'category',
        'status',
        'description'
    ];
}
