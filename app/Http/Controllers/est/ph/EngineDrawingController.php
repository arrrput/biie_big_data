<?php

namespace App\Http\Controllers\est\ph;

use App\Http\Controllers\Controller;
use App\Models\est\ph\PhEngineDrawingModel;
use Illuminate\Http\Request;

class EngineDrawingController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = PhEngineDrawingModel::select('*' )
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/est/ph/action_st')
                    // ->editColumn('created_at', function($data){ 
                    //     $formatedDate = Carbon::createFromFormat('Y-m-d', $data->created_at)->format('d M Y'); 
                    //     return $formatedDate; 
                    //     })
                  ->rawColumns(['action'])
                  ->addIndexColumn()
                  ->make(true);
        }
    }
}
