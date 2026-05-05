<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        
        $user = User::where('email',$request->username)
        // ->where('status', '>', 0)
        // ->whereIn('status', [1])
        // ->where('status', '!=', 0)
        ->first();
        // dd($request->remember_me);
        if(empty($user)){
            return redirect()->route('auth.login')->with([
                'message'=> 'Wrong User Credentials',
                'code'=> '304'
            ]);
        }

        // dd(Hash::check($request->password,$user->password));

        if(Hash::check($request->password,$user->password)){
            Session::put([
                'username'=>$user->email
            ]);
            // if($request->remember_me == 'on'){
            //     Cookie::queue('username', $user->username, 21900);
            // }
            
            return redirect()->route('pages.index');
        } else{
            return redirect()->route('auth.login')->with([
                'message'=> 'Wrong User Credentials',
                'code'=> '304'
            ]);
        }
    }
}
