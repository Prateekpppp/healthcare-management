<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Patient extends BaseModel
{

    
	protected $fillable = 
	[
        'first_name', 'middle_name', 'last_name','email', 'age', 'phone', 'gender', 'birth_date', 'country', 'state', 'district' , 'location' , 'occupation' ,
        'description' , 'relative_name' , 'relative_phone' , 'marital_status', 'blood_group','disease','doctor',
    ];

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }
     public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
    
    public function packageSales()
    {
        return $this->hasMany('App\Models\PackageSale');
    }
    
    public function patientservices()
    {
        return $this->hasMany('App\Models\PatientService');
    }

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }
    //
}
