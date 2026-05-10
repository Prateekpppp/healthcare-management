<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends BaseModel
{
    //
    protected $fillable = ['name','quantity'];

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }
}
