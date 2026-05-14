<?php

namespace App\Models;

use App\Models\BaseModel;

class ServicePackage extends BaseModel
{
    //

    protected $fillable = ['service_id', 'package_id'];

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
