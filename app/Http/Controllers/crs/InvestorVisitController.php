<?php

namespace App\Http\Controllers\crs;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use Illuminate\Http\Request;

class InvestorVisitController extends Controller
{
    //
    public function index(){
        $dept = DepartmentModel::all();

        return view('backend.crs.add_investor', compact('dept'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
