<?php

namespace App\Models;

use App\Models\BaseModel;

class Disease extends BaseModel
{
    //
    public $timestamps = false;
    
	protected $fillable = 
	[
        'name',
    ];
}
