<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function trash(Request $request){
        // dd($request->all());
        $model = 'App\\Models\\' . $request->model;
        $model = app($model);
        $item = $model->where('id',$request->id)->update(['status'=>0]);
        return back()->with('success', 'Data Removed Successfully.');
    }

    public function changeStatus(Request $request){
        // dd($request->all());
        $model = 'App\\Models\\' . $request->model;
        $model = app($model);
        $item = $model->where('id',$request->id)->update(['status'=>$request->status]);
        return back()->with('success', 'Status Updated Successfully.');
    }

}
