<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageMedicine extends Model
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
