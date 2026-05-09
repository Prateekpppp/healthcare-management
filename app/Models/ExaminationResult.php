<?php

namespace App\Models;

use App\Models\BaseModel;

class ExaminationResult extends BaseModel
{
     protected $fillable = ['test_report_id', 'macroscopic_result', 'microscopic_result','result'];

     public function test_report ()
     {
     	return $this->belongsTo('App\Models\TestReport');
     }
}
