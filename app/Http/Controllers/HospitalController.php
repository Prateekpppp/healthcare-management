<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    //
    
    public function index(Request $request)
    {
        $data = Hospital::get();
        //$days = explode(',',$employees->working_day);
        return view('hospital.index' , compact('data'));

        //
    }

    public function updatePage(Request $request)
    {
        if(isset($request->id) && $request->id){
            $data = Hospital::find($request->id);
            // dd($data);
            return view('hospital.updatePage', compact('data'));

        } else{
            return view('hospital.updatePage');

        }
        
    }

    public function updateData(Request $request)
    {
        if(isset($request->id) && $request->id){

            $data = Hospital::find($request->id);
            // dd($data);
            $data->update($request->all());
            return back()->with('success', 'Data updated successfully');

        } else{

            Hospital::create($request->all());
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }
}
