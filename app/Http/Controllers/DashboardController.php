<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use App\Models\EstateDownload;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
                                   
        $tot_file_draw = DataModel::all()
        ->count();

    $request_pending = EstateDownload::where('status','=', 0)
            ->count();
    $request_accept = EstateDownload::where('status','=', 1)
            ->count();  
    $request_reject = EstateDownload::where('status','=', 2)
            ->count();  
        return view('backend.dashboard.index', compact('request_pending','request_accept','tot_file_draw','request_reject'));
    }
}
