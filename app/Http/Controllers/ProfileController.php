<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        
        $dept = DepartmentModel::all();
        return view('backend.profile.index', compact('dept'));
    }

    public function updateProfile(Request $request){
        // unlink(storage_path('app/public/profile/'.Auth::user()->image));
        $data = $request->file('avatar');
            $data->storeAs('public/profile', $data->hashName());
            $name_file = $data->hashName();

            
        $update = User::where('id', Auth::user()->id)
            ->update(['image' => $name_file]);
        return response()->json(['data' => $update, 'success' => true, 'message' => 'success'], 200);
    }

    public function updatePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return back()->with('success','Password change successfully!');

    }
}
