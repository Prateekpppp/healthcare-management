<?php

namespace App\Models;

use App\Models\BaseModel;

class ServiceSale extends BaseModel
{
	protected $fillable = ['service_id', 'service_name','amount', 'invoice_id' ];
    //


public function invoice()
{
    return $this->hasOne('App\Models\Invoice');
}

public function service()
{
	return $this->belongsTo('App\Models\Service');
}

}