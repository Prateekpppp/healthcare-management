<?php

namespace App\Models;

use App\Models\BaseModel;

class Medicine extends BaseModel
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
