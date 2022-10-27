<?php

namespace App\Http\Controllers\est;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\est\MetereadingSatuanModel;

class UtilitiesController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){

        }

        $meter = MetereadingSatuanModel::select('*')->get();
        return view('backend.est.utilities', compact('meter'));
    }
}
