<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Session;

abstract class Controller
{
    //
    public $currentUser = null;
    public $role_id = null;
    public $employee = null;
    public $doctor_id = null;

    public function __construct(){
        $this->currentUser = User::getCurrentUser();
        // dd($this->currentUser);
        if($this->currentUser){
            $this->employee = Employee::where('email',$this->currentUser->email)->first();
    
            $this->role_id = $this->currentUser->role_id;
            if($this->role_id == 2){
                $this->doctor_id = Doctor::where('employee_id',$this->employee->id)->first()->id;
            }
        }
    }

    public function logoutUser($message){ 
        Session::flush();
        // session('message',$message);
        return redirect()->route('auth.login')->with([
            'message'=> $message,
            'code'=> '304'
        ]);
        // return redirect()->route('auth.login');
    }
}
