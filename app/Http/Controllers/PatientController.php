<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\PackageSale;
use App\Models\Service;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diseases = Disease::get();
        if($this->currentUser->role_id == 2){
            $doctorId = $this->doctor_id;
            $data = Patient::filter($request->all())
            ->whereHas('appointments', function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            });
        } else{
          $data = Patient::filter($request->all());
        }
        $data = $data->paginate(10);
        return view('patients.index' , compact('data','diseases'));

        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //return $data;
        $this->validate($request, []);
        $data = $request->all();
        //return $data;
        Patient::create($data);
        return back()->with('success', 'Patient saved Successfully.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Patient::find($id);
        //return $patient->appointments()->get();
        $doctors = Doctor::get();
        return view('patients.profile' , compact('data', 'doctors'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        if($patient->status)
        {
           $patient->status = 0;
        }
        else
        {

         $patient->status = 1;
        }
        $patient->save();
        return back()->with('success', 'Status changed successfully.');
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $data = $request->all();
        $patient->update($data);
        return back()
            ->with('success', 'Patient updated successfully');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id); 
        if (count($patient->invoices) || count($patient->reports) || count($patient->packageSales) ) {
            return back()->with('error', 'Patient cannot deleted...');
        }
        $patient->delete();
        return redirect()->route('patient.index')->with('success', 'Patient Deletetd Successfully');  
        //
    }
    
    public function updatePage(Request $request)
    {
        $diseases = Disease::get();
        if(isset($request->id) && $request->id){
            $data = Patient::find($request->id);
            // dd($data);
            return view('patients.updatePage', compact('data', 'diseases'));

        } else{
            return view('patients.updatePage', compact('diseases'));

        }
        
    }

    public function updateData(Request $request)
    {
        if(isset($request->id) && $request->id){

            $data = Patient::find($request->id);
            // dd($data);
            $data->update($request->all());
            // return back()->with('success', 'Data updated successfully');

        } else{

            $data = Patient::create($request->all());
            // return back()->with('success', 'Data saved Successfully.'); 

        }
        // return back()->with('success', 'Data updated successfully');
        return view('patients.profile' , compact('data'));
        
    }

    public function getPatientData(Request $request)
    {
        $patient = Patient::find($request->id);
        $service_id = $request->service_id;
        $fee = 0;
        if ($service_id) {
            $service = $patient->patientservices()->where('service_id', $service_id)->with('service')->first();
            // $service = Service::find($service_id);
            // dd($service);
            if ($service) {
                // $fee = $service->pivot->fee;
                $fee = $service->service->fee;
            }
        }
        $packages = $patient->packageSales()->with('package')->get();
        // dd($packages);
        foreach ($packages as $key => $package) {
            $fee += $package->package->price;
        }
        // dd($fee);
        $total_amount = $fee;
        return response()->json([
            'fee' => $fee,
            'total_amount' => $total_amount
        ]);
    }
}
