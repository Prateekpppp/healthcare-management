<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class ServicePackageController extends Controller
{
    //
    
    public function index(Request $request)
    {
        $data = ServicePackage::where('service_id', $request->id)->orderBy('id','desc')->get();
        $service = Service::where('id', $request->id)->first();
        // dd($data[0]->service->name);
        return view('package_services.index' , compact('data', 'service'));
    }
    
    public function updatePage(Request $request)
    {
        $service = Service::find($request->service_id);
        $packages = Package::orderBy('id','desc')->get();
        if(isset($request->id) && $request->id){
            $data = ServicePackage::find($request->id);
            // dd($data);
            return view('package_services.updatePage', compact('data', 'service', 'packages'));

        } else{
            return view('package_services.updatePage', compact('service', 'packages'));

        }
        
    }

    public function updateData(Request $request)
    {
        if(isset($request->id) && $request->id){

            $data = ServicePackage::find($request->id);
            // dd($data);
            $data->update($request->all());
            return back()->with('success', 'Data updated successfully');

        } else{

            ServicePackage::create($request->all());
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }
}
