<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\OpdSales;
use App\Models\Test;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = User::getCurrentUser();
    	  $user = $admin->id;
        $role = $admin->role_id;
        // dd($user);
        
      	$invoices = Invoice::where('user_id', $user)->whereDate('created_at', '=', date('Y-m-d'))->get();
      	$invoices = Invoice::limit(10)->get();
        $patients = Patient::get();
        $appointments = Appointment::whereDate('appointment_date', '=', date('Y-m-d'))->orderBy('id', 'desc')->get();
        if($this->currentUser->role_id == 2){
          $appointments = Appointment::where('doctor_id',$this->doctor_id)->limit(10)->get();
        } else{
          $appointments = Appointment::limit(10)->orderBy('id', 'desc')->get();
        }
        // dd($this->currentUser->id);
        $opds = OpdSales::whereDate('created_at' , '=', date('Y-m-d'))->get();
        $opds = OpdSales::limit(10)->get();
      	//return $invoices;
      	$total['sub_total'] = $invoices->sum('sub_total');
      	$total['discount'] = $invoices->sum('discount');
     	  $total['tax_amount'] = $invoices->sum('tax_amount');
      	$total['total_amount'] = $invoices->sum('total_amount');
      	// Appointment
        $pending['appointment'] = Appointment::where('status', 0)->count();
        $total_doctor = Doctor::get()->count();
        $total_test = Test::get()->count();
      

    	return view('pages.index' , compact('invoices', 'total' ,'appointments','patients' , 'pending' , 'opds', 'total_doctor', 'total_test','role'));

    }
}
