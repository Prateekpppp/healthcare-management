<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    
    public function addUser(Request $request){
        try {
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
            $admin = $this->currentUser;
            $request->password = Hash::make('user123');
            $request->created_by = $admin->id;
            User::create($request->all());
            return response()->json([
                'message'=> 'User added successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }
    
    public function updateUser(Request $request){
        try {
            
            $user = User::where('email',$request->email)->first();

            if(!$user){
                
                $this->addUser($request);
                return response()->json([
                    'message'=> 'User added successfully',
                    'response_code'=> '200',
                ]);
            }

            $request->password = Hash::make($request->password);
            $user->update($request->all());
            
            return response()->json([
                'message'=> 'User updated successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function searchItem(Request $request){
        $model = 'App\\Models\\' . $request->model;
        $model = app($model);
        $items = $model->where($request->key, 'like', '%' . $request->search . '%')->paginate(10);
        return response()->json([
            'data' => $items,
        ]);
    }
}
