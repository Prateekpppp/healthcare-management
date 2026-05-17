<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medicine;
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
        $medicines = Medicine::get();
        $services = Service::get();
        $patient = Patient::find($request->patient_id);
        $appointments = Appointment::filter($request->all())->get();

        // dd($patient->patientservices->service_id);

        $data = PatientService::filter($request->only(['service_id','appointment_id']))->first();
        
        // dd($data,$request->all());
        if($data && isset($data->id) && $data->id){
        // if(isset($request->id) && $request->id){
            $data->medicine = explode(',',$data->medicine);
            // dd($data);
            return view('patient_services.updatePage', compact('data', 'services', 'patient', 'appointments','medicines'));

        } else{
            return view('patient_services.updatePage', compact('services', 'patient', 'appointments','medicines'));

        }
        
    }

    public function updateData(Request $request)
    {
        try {
            if($request->medicine){
                $data = new Request($request->except(['medicine']));
                $data->merge([
                    'medicine'=>implode(',',$request->medicine)
                ]);
        
                $request = $data;

            }
            
            $data = PatientService::filter($request->only(['service_id','appointment_id']))->first();
            
            // dd($data,$request->all());
            if($data && isset($data->id) && $data->id){
                // dd($data->id);
                $data->update($request->all());
                // return back()->with('success', 'Data updated successfully');

            } else{

                $data = PatientService::create($request->all());
                // return back()->with('success', 'Data saved Successfully.');

            }
            // $packages = ServicePackage::where('service_id',$data->service_id)->get();
            $invoice_type = "Prescription";
            return redirect()
                ->route('pages.printPatientService',['id'=>$data->id]);
        } catch (\Throwable $th) {
                return back()->with('error', "Something Went wrong");
        }

    }

    public function print(Request $request){
        
        $data = PatientService::find($request->id);
        $invoice_type = "Prescription";
        $medicines = explode(',',$data->medicine);
        $medicines = Medicine::whereIn('id',$medicines)->get();
        return view('patient_services.print', compact('data','invoice_type','medicines'));
    }

    public function getPatientService(Request $request){
        
        $patientService = PatientService::filter($request->all())->first();

        return response()->json([
            'no_of_days' => $patientService->no_of_days ?? 0,
        ]);
    }
    
}
