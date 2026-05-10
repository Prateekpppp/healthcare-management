<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class BaseModel extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('latest', function ($query) {
            $query->orderBy('id', 'desc');
        });
    }

    public function scopeFilter($query, array $filters = [])
    {
        $fillable = $this->getFillable();

        $filters = count($filters) > 0 ? $filters : Request::all();

        $filters = array_filter($filters, function ($value) {
            return $value !== null && $value !== '';
        });

        // dd($filters);

        foreach ($filters as $key => $value) {

            // if ($value === null || $value === '') {
            //     continue;
            // }

            // only allow fillable fields
            if (in_array($key, $fillable)) {
                if (in_array($key, ['name','first_name', 'description'])) {
                    $query->where($key, 'like', '%' . $value . '%');
                } elseif (in_array($key, ['date','appointment_date'])) {
                    $query->whereDate($key, $value);
                } else{

                    $query->where($key, $value);
                }
            }
        }

        return $query;
    }
}