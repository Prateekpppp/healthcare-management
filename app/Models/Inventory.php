<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['name','quantity'];

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }
}
