<?php

namespace App\Models;

use App\Models\BaseModel;

class TestResult extends BaseModel
{
	protected $fillable = ['test_report_id', 'result', 'status'];
	

	public function test_report()
	{
		return $this->belongsTo('App\Models\TestReport');
	}
	
    //
}
