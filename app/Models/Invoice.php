<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable = ['patient_id','service_id','invoice_no','comment','payment_type','sub_total', 'tax_amount', 'total_amount','discount','user_id','status', 'cash'];

	public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function serviceSales()
    {
         return $this->hasOne('App\Models\ServiceSale');
    }

    public function opd_sales()
    {
         return $this->hasMany('App\Models\OpdSales');
    }

     public function doctor_referred()
    {
         return $this->hasMany('App\Models\DoctorReferred');
    }
      public function packageSales()
    {
         return $this->hasMany('App\Models\PackageSale');
    }

     public function invoiceReturns()
    {
         return $this->hasMany('App\Models\InvoiceReturn');
    }
    //
}
