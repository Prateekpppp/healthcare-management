<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($this->currentUser->role_id == 2){
          $appointments = Appointment::filter($request->all())
            ->where('doctor_id',$this->doctor_id);
        } else{
          $appointments = Appointment::filter($request->all());
        }
        $data = $appointments->paginate(10);
        $patients = Patient::get();
        $doctors = Doctor::get();
        return view('appointments.appointments', compact('data','patients','doctors'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //return $request->all();
        $request ['appointment_date'] = date('Y-m-d', strtotime($request->appointment_date));
       
        $data = $request->all();
        $this->validate($request, ['doctor_id'=>'required|numeric', 'patient_id'=>'required',]);
        //return $data;
        Appointment::create($data);
        return back()->with('success', 'Appointment saved Successfully.');
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
        $appointment = Appointment::find($id);

        if($appointment->status)
        {
           $appointment->status = 0;
        }
        else
        {

         $appointment->status = 1;
        }
        $appointment->save();
        $data = $appointment;
        $patients = Patient::get();
        $doctors = Doctor::get();

        // return view('appointments.updateAppointment', compact('data','patients','doctors'));
        
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
    public function update(Request $request)
    {
        
       // return $request->all();
    }

     public function addAppointment()
    {
        $patients = Patient::get();
        $doctors = Doctor::get();

        return view('appointments.updateAppointment', compact('patients','doctors'));
        
    }

    public function updatePage(Request $request)
    {
        $patients = Patient::get();
        $doctors = Doctor::get();

        if(isset($request->id) && $request->id){
            $data = Appointment::find($request->id);
            // dd($data);
            return view('appointments.updatePage', compact('data','patients','doctors'));

        } else{
            return view('appointments.updatePage', compact('patients','doctors'));

        }
        
    }

    public function updateAppointment(Request $request)
    {
        //return $request->all();
        // $this->validate($request, ['doctor_id'=>'required']);
        if($request->appointment_date) {
            $request['appointment_date'] = date('Y-m-d', strtotime($request->appointment_date));
            
        }
        if(isset($request->id) && $request->id){
            $data = Appointment::find($request->id);
            $data->update($request->all());
            // return back()->with('success', 'Appointment updated successfully');

        } else{
            $data = Appointment::create($request->all());
            // return back()->with('success', 'Appointment saved Successfully.'); 

        }
        
        return view('appointments.print', compact('data'));
        
        //
    }

    public function getDoctorFee(Request $request)
    {   
        $doctor = Doctor::find($request->id);

        return response()->json([
            'fee' => $doctor->fee ?? 0
        ]);
    }

    public function print(Request $request){
        $data = Appointment::find($request->id);
        // dd($data->patient);
        $data->invoice_no = $this->hospital->invoice_prefix . $data->id;
        return view('appointments.print', compact('data'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return back()->with('success', 'Appointment cannot be deleted..');
    }

    public function toggleStatus($id)
    {
        $appointment = Appointment::find($id);
        $data = array();

        if($appointment->status)
        {
           $appointment->status = 0;
        }
        else
        {

         $appointment->status = 1;
        }

        $appointment->save();
        return back();
    }
}
