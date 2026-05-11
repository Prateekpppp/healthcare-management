<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Employee::filter($request->all())->get();

        //$days = explode(',',$employees->working_day);
        return view('employees.index' , compact('data'));

        //
    }

    public function updatePage(Request $request)
    {
        $departments = Department::select('id','name')->get();
        if(isset($request->id) && $request->id){
            $data = Employee::find($request->id);
            // dd($data);
            return view('employees.updatePage', compact('data','departments'));

        } else{
            return view('employees.updatePage', compact('departments'));

        }
        
    }

    public function updateData(Request $request)
    {
        $user = new Request();
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->role_id = $request->type;
        if($request->password){
            $user->password = Hash::make($request->password);
        } else{
            $user->password = '';
        }

        if(isset($request->id) && $request->id){

            $data = Employee::find($request->id);
            // dd($data);
            $data->update($request->all());
            User::update($user);
            return back()->with('success', 'Data updated successfully');

        } else{

            Employee::create($request->all());
            User::create($user);
            return back()->with('success', 'Data saved Successfully.'); 

        }
        
    }

    public function create()
    {
        $departments = Department::select('id','name')->get();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $this->validate($request, ['department_id'=>'required|numeric']);
         if (count($request->working_day)) {
             $request['working_day'] = implode(',',$request->working_day);
        }
        //serialize($request->working_day);
        $data = $request->all();
        if($request->type == 'Doctor')
        {
            $data['first_name'] = 'DR.'.$request->first_name;
        }
        //return $data;

        Employee::create($data);
        return redirect()->route('employee.index')->with('success', 'Employee saved Successfully.');
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
        $employee = Employee::find($id);
        $departments = Department::get();
        return view('employees.profile', compact('employee', 'departments'));
        //
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::get();
        $working_day = explode(',', $employee->working_day);
        return view('employees.edit', compact('employee', 'departments', 'working_day'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();

        $employee = Employee::find ( $id );
        if ($request->working_day) {
            $request['working_day'] = implode(',',$request->working_day);
        }
        if($request->type == 'Doctor')
        {
            $request['first_name'] = 'DR.'.$request->first_name;
        }
        $employee->update($request->all());
        $departments = Department::get();
         return redirect()->route('employee.index')->with('success', 'Employee Updated Successfully');
        //
    }


    public function destroy($id)
    {
        //return $id;
        $employee = Employee::find($id);
        if (count($employee->doctor)) {
            return back()->with('error', 'Doctor cannot be delete...');
        }
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee Deletetd Successfully');

    }

}
