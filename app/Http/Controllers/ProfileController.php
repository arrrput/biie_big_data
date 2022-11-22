<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index(){
        
        $dept = DepartmentModel::all();
        return view('backend.profile.index', compact('dept'));
    }

    public function updateProfile(Request $request){
        unlink(storage_path('app/public/profile/'.Auth::user()->image));
        $data = $request->file('avatar');
            $data->storeAs('public/profile', $data->hashName());
            $name_file = $data
            ->hashName();

            
        $update = User::where('id', Auth::user()->id)
            ->update(['image' => $name_file]);
        return response()->json(['data' => $update, 'success' => true, 'message' => 'success'], 200);
    }
}
