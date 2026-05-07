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
        return $this->belongsTo('App\Models\Appointment');
    }

	public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    
    public function service()
    {
        return $this->hasMany('App\Models\Service');
    }
}
