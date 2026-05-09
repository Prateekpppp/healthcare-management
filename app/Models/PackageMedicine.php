<?php

namespace App\Models;

use App\Models\BaseModel;

class PackageMedicine extends BaseModel
{
    //
    protected $fillable = [
        'package_id',
        'medicine_id'
    ];

    public function medicine(){
        return $this->belongsTo('App\Models\Medicine','medicine_id','id');
    }
    
    public function package(){
        return $this->belongsTo('App\Models\Package','package_id','id');
    }
}
