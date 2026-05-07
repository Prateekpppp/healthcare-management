<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientService extends Model
{
    //
	protected $fillable = 
	[
        'patient_id', 'appointment_id', 'service_id', 'quantity',
    ];

    public function appointments()
    {
        return $this->belongsTo('App\Models\Appointment','id','appointment_id');
    }

	public function patient()
    {
        return $this->belongsTo('App\Models\Patient','id','patient_id');
    }
    
    public function service()
    {
        return $this->hasOne('App\Models\Service','id','service_id');
    }
}
