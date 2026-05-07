<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        // 'password', 'remember_token',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id','password','created_by','status',
    ];

    /**
    * Query for return active attributes
    * @param query
    * @return Query
    */
          
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
 
    public static function getCurrentUser($key=NULL,$value=NULL){
        if($key != NULL && $value != NULL){

            return static::where($key, $value)->first();

        }
        
        $userData = Session::get('username');
        if(!empty($userData)){
            return static::where('email', $userData)->first();
        } else if($userData = Session::get('username')){
            return static::where('email', $userData)->first();
        } else{
            return False;
        }
    }
}
