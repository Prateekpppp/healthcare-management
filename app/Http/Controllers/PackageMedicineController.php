<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Package;
use App\Models\PackageMedicine;
use Illuminate\Http\Request;

class PackageMedicineController extends Controller
{
    
    public function index(Request $request)
    {
        $data = PackageMedicine::where('package_id', $request->id)->orderBy('id','desc')->get();
        $package = Package::find($request->id);
        // dd($data[0]->service->name);
        return view('package_medicines.index' , compact('data', 'package'));
    }
    
    public function updatePage(Request $request)
    {
        $medicines = Medicine::orderBy('id','desc')->get();
        $package = Package::find($request->package_id);
        
        if(isset($request->id) && $request->id){
            $data = PackageMedicine::find($request->id);
            // dd($data);
            return view('package_medicines.updatePage', compact('data', 'medicines', 'package'));

        } else{
            return view('package_medicines.updatePage', compact('medicines', 'package'));

        }
        
    }

    public function updateData(Request $request)
    {
        if(isset($request->id) && $request->id){

            $data = PackageMedicine::find($request->id);
            // dd($data);
            $data->update($request->all());
            return back()->with('success', 'Data updated successfully');

        } else{

            PackageMedicine::create($request->all());
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }
}
