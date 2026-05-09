<?php

namespace App\Models;

use App\Models\BaseModel;

class PackageSale extends BaseModel
{
	protected $fillable = ['package_id', 'invoice_id', 'package_price', 'patient_id'];

	public function package()
	{
		return $this->belongsTo('App\Models\Package');
	}
    //
    public function invoice()
	{
		return $this->belongsTo('App\Models\Invoice');
	}
	public function patient()
	{
		return $this->belongsTo('App\Models\Patient');
	}
    //
}
