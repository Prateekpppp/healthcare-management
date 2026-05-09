<?php

namespace App\Models;

use App\Models\BaseModel;

class TestExamination extends BaseModel
{
	protected $fillable = ['test_id', 'macroscopics', 'microscopics'];

	public function test()
	{
		return $this->belongsTo('App\Models\Test');

	}
	public function macroscopic()
	{
		return unserialize($this->macroscopics);
	}
	public function microscopic()
	{
		return unserialize($this->microscopics);
	}
    //
}
