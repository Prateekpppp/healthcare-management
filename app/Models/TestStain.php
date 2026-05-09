<?php

namespace App\Models;

use App\Models\BaseModel;

class TestStain extends BaseModel
{
    protected $fillable = ['test_id', 'test_names'];

    public function test()
    {
    	return $this->belongsTo('App\Models\Test');
    }

    public function test_name()
    {
    	return unserialize($this->test_names);
    }


}
