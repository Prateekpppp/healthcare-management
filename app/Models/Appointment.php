<?php

namespace App\Models;

use App\Models\BaseModel;

class Appointment extends BaseModel
{
	protected $fillable = 
	[
        'name', 'description', 'time', 'patient_id', 'doctor_id', 'status', 'appointment_date','doctor_fee','discount','discount_description'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
    //
}
