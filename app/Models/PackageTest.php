<?php

namespace App\Models;

use App\Models\BaseModel;

class PackageTest extends BaseModel
{
	protected $fillable = ['package_id', 'test_id', 'status'];

	public function package()
	{
		return $this->belongsTo('App\Models\Package');
	}
    //
    public function test()
	{
		return $this->belongsTo('App\Models\Test');
	}
    //
}
