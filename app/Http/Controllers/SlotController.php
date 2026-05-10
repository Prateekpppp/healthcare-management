<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Patient;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $fillables = (new Slot())->getFillable();
        $patient = isset($request->patient_id) ? Patient::find($request->patient_id) : null;
        // if(isset($request->patient_id) && $request->patient_id){
        //     $data = Slot::where('patient_id', $request->patient_id)->get();
        // } else {
        //     $data = Slot::get();
        // }

        $inventories = Inventory::get();
        $patients = Patient::get();

        $data = Slot::filter($request->all())->get();
        // dd($data[0]->service->name);
        return view('slots.index' , compact('data', 'patient','fillables', 'inventories', 'patients'));
    }
    
    public function updatePage(Request $request)
    {
        $inventories = Inventory::get();
        $patients = Patient::get();
        // $patient = $request->patient_id ? Patient::find($request->patient_id) : null;

        if(isset($request->id) && $request->id){
            $data = Slot::find($request->id);
            // dd($data);
            return view('slots.updatePage', compact('data', 'inventories', 'patients'));

        } else{
            return view('slots.updatePage', compact('inventories', 'patients'));

        }
        
    }

    public function updateData(Request $request)
    {
        // $hasLot = Slot::where('inventory_id', $request->inventory_id)
        //     ->whereDate('from', $request->from)
        //     ->where
        if(isset($request->id) && $request->id){

            $data = Slot::find($request->id);
            // dd($data);
            $data->update($request->all());
            return back()->with('success', 'Data updated successfully');

        } else{

            Slot::create($request->all());
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }

    public function avaiableSlots(Request $request){
        $slots = Slot ::where('inventory_id', $request->inventory_id)
        // ->where(function($query) use ($request){
        //     $query->whereDate('from', '<=', $request->from)
        //     ->whereDate('to', '>=', $request->from);
        // })
        ->whereDate('from', '<=', $request->from)
        ->whereDate('to', '>=', $request->from)
        // ->where(function($query) use ($request){
        //     $query->whereTime('start_time', '<=', $request->start_time)
        //     ->whereTime('end_time', '>=', $request->start_time);
        // })
        ->selectRaw('count(*) as total_slots, start_time, MAX(end_time) as end_time')
        ->groupBy('start_time','end_time')
        ->having('total_slots', '>', 0)
        ->get();
        
        return response()->json([
            'slots' => $slots,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slot $slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slot $slot)
    {
        //
    }
}
