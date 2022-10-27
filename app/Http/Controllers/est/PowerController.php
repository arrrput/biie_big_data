<?php

namespace App\Http\Controllers\est;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerController extends Controller
{
    //
    public function index(Request $request){

        return view('backend.est.power');
    }
}
