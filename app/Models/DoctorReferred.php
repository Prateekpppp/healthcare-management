<?php

namespace App\Models;

use App\Models\BaseModel;

class DoctorReferred extends BaseModel
{
    protected $fillable = ['doctor_id', 'invoice_id'];

    public function doctor()
    {
    	return $this->belongsTo('App\Models\Doctor');
    }

     public function invoice()
    {
    	return $this->belongsTo('App\Models\Invoice');
    }
}
