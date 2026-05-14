<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $appointments = Appointment::select(
            'id',
            'patient_id',
            DB::raw("(SELECT first_name 
                  FROM patients 
                  WHERE patients.id = appointments.patient_id
                 ) as patient_name"),
            DB::raw('id as transaction_id'),
            DB::raw('appointment_date as date'),
            DB::raw("'Appointment' as type"),
            DB::raw("doctor_fee as amount"),
            'created_at'
        );

        $data = Invoice::select(
            'id',
            'patient_id',
            DB::raw("(SELECT first_name 
                  FROM patients 
                  WHERE patients.id = invoices.patient_id
                 ) as patient_name"),
            DB::raw('invoice_no as transaction_id'),
            DB::raw('created_at as date'),
            DB::raw("'Invoice' as type"),
            DB::raw("total_amount as amount"),
            'created_at'
        )

        ->union($appointments)

        ->orderBy('created_at', 'desc');

        if(isset($request->transaction_id)){
            $data = $data->where('transaction_id',$request->transaction_id);
        }
        
        if(isset($request->patient_id)){
            $data = $data->where('patient_id',$request->patient_id);
        }
        $data = $data->paginate(15);

            // dd($data);

        return view('transactions.index' , compact('data'));
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
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
