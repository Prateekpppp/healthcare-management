<?php

namespace App\Models;

use App\Models\BaseModel;

class Service extends BaseModel
{
    
    
	protected $fillable = ['name', 'amount', 'department_id'];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function tests()
    {
    	return $this->hasMany('App\Models\Test');
    }

    public function service_sales()
    {
        return $this->hasMany('App\Models\ServiceSale');
    }
    
    public function service_packages()
    {
        return $this->hasMany('App\Models\ServicePackage');
    }

    
    //
}
