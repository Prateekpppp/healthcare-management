<?php

namespace App\Models;

use App\Models\BaseModel;

class Report extends BaseModel
{
	protected $fillable = ['patient_id','report','result','status', 'doctor_id'];
    //
    public function patient()
    {
    	return $this->belongsTo('App\Models\Patient');
    }

    public function test_reports()
    {
        return $this->hasMany('App\Models\TestReport');
    }
}
