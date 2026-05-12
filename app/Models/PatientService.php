<?php

namespace App\Models;

use App\Models\BaseModel;

class PatientService extends BaseModel
{
    //
	protected $fillable = 
	[
        'patient_id', 'appointment_id', 'service_id', 'quantity','package_id','discount','discount_description'
    ];

    public function appointments()
    {
        return $this->belongsTo('App\Models\Appointment','appointment_id','id');
    }

	public function patient()
    {
        return $this->belongsTo('App\Models\Patient','patient_id','id');
    }
    
    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package','package_id','id');
    }

}
