<?php

namespace App\Models;

use App\Models\BaseModel;

class TestAntibiotic extends BaseModel
{
   protected $fillable = ['name'];

    /**
     * Get the parent that owns the category.
     */

    public function tests()
    {
    	return $this->belongsToMany('App\Models\Test');
    }

    public function test_antibiotic_results() 
    {
    	return $this->hasMany('App\Models\TestAntibioticResult');
    }
}
