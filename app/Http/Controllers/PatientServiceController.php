<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientService;
use App\Models\Service;
use Illuminate\Http\Request;

class PatientServiceController extends Controller
{

    public function index(Request $request)
    {
        $data = PatientService::where('patient_id', $request->id)->orderBy('id','desc')->get();
        $patient = Patient::find($request->id);
        // dd($data[0]->service->name);
        return view('patient_services.index' , compact('data', 'patient'));
    }
    
    public function updatePage(Request $request)
    {
        $services = Service::orderBy('id','desc')->get();
        $patient = Patient::find($request->patient_id);
        $appointments = Appointment::where('patient_id', $request->patient_id)->orderBy('id','desc')->get();

        if(isset($request->id) && $request->id){
            $data = PatientService::find($request->id);
            // dd($data);
            return view('patient_services.updatePage', compact('data', 'services', 'patient', 'appointments'));

        } else{
            return view('patient_services.updatePage', compact('services', 'patient', 'appointments'));

        }
        
    }

    public function updateData(Request $request)
    {
        if(isset($request->id) && $request->id){

            $data = PatientService::find($request->id);
            // dd($data);
            $data->update($request->all());
            return back()->with('success', 'Data updated successfully');

        } else{

            PatientService::create($request->all());
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }
    
}
