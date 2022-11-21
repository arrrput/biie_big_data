<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(){
        
        $dept = DepartmentModel::all();
        return view('backend.profile.index', compact('dept'));
    }
}
