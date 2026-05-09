<?php

namespace App\Models;

use App\Models\BaseModel;

class Package extends BaseModel
{
	protected $fillable = ['name', 'description', 'price'];

	public function packageSales()
	{
		return $this->hasMany('App\Models\PackageSale');
	}
	public function packageTests()
	{
		return $this->hasMany('App\Models\PackageTest');
	}
    //
}
