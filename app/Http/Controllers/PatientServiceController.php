<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientService;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class PatientServiceController extends Controller
{

    public function index(Request $request)
    {
        $data = PatientService::where('patient_id', $request->patient_id)->get();
        $patient = Patient::find($request->patient_id);
        // dd($patient->patientservices);
        return view('patient_services.index' , compact('data', 'patient'));
    }
    
    public function updatePage(Request $request)
    {
        $services = Service::get();
        $patient = Patient::find($request->patient_id);
        $appointments = Appointment::filter($request->all())->get();

        // dd($patient->patientservices->service_id);
        $data = PatientService::filter($request->all())->first();

        if($data || (isset($request->id) && $request->id)){
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
            // return back()->with('success', 'Data updated successfully');

        } else{

            $data = PatientService::create($request->all());
            // return back()->with('success', 'Data saved Successfully.');

        }
        $packages = ServicePackage::where('service_id',$data->service_id)->get();
        // dd($packages->package);
        return view('patient_services.print', compact('data','packages'));

    }
    
}
