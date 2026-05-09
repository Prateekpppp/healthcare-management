<?php

namespace App\Models;

use App\Models\BaseModel;

class TestReferenceResult extends BaseModel
{
    protected $fillable = ['test_report_id', 'test_reference_id', 'result', 'flag'];

    public function test_report()
    {
    	return $this->belongsTo('App\Models\TestReport');
    }
    public function test_reference()
    {
    	return $this->belongsTo('App\Models\TestReference');
    }
}
