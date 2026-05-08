<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    //

    protected $fillable = ['service_id', 'package_id'];

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function package()
    {
        return $this->hasOne('App\Models\Package','id','package_id');
    }
}
