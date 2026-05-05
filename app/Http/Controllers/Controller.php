<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

abstract class Controller
{
    //
    public $currentUser;

    public function __construct(){
        $this->currentUser = User::getCurrentUser();
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
