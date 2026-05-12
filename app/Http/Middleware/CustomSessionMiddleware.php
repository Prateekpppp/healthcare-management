<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Appdata;
use App\Models\Hospital;
use App\Models\Role;

class CustomSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);

        $roles = [
            1 => 'Admin',
            2 => 'Doctor',
            3 => 'Receptionist',
            4 => 'Laboratory',
            5 => 'Pharmacy',
            6 => 'Accountant',
            7 => 'Nurse',
            8 => 'Other'
        ];

        $currentUser = User::getCurrentUser();

        $hostpital = Hospital::first();

        
        View::share('currentUser',$currentUser);
        View::share('roles',$roles);
        View::share('hospital',$hostpital);
        View::share('request',$request);
        // dd($request->all());
        return $next($request);
    }
}
