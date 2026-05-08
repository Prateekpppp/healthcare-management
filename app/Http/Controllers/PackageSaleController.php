<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageSale;
use App\Models\Patient;
use Illuminate\Http\Request;

class PackageSaleController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = PackageSale::where('patient_id', $request->id)->orderBy('id','desc')->get();
        $patient = Patient::find($request->id);
        // dd($data[0]->service->name);
        return view('packageSales.index' , compact('data', 'patient'));
    }
    
    public function updatePage(Request $request)
    {
        $packages = Package::orderBy('id','desc')->get();
        $patient = Patient::find($request->patient_id);
        if(isset($request->id) && $request->id){
            $data = PackageSale::find($request->id);
            // dd($data);
            return view('packageSales.updatePage', compact('data', 'packages', 'patient'));

        } else{
            return view('packageSales.updatePage', compact('packages', 'patient'));

        }
        
    }

    public function updateData(Request $request)
    {
        if(isset($request->id) && $request->id){

            $data = PackageSale::find($request->id);
            // dd($data);
            $data->update($request->all());
            return back()->with('success', 'Data updated successfully');

        } else{

            PackageSale::create($request->all());
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }
}
