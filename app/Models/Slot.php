<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends BaseModel
{
    protected $fillable = ['patient_id', 'inventory_id', 'booking_date', 'from', 'to', 'start_time', 'end_time'];

    // slots belongs to patient and inventory
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}
