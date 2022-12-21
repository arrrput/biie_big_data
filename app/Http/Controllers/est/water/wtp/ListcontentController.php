<?php

namespace App\Http\Controllers\est\water\wtp;

use App\Http\Controllers\Controller;
use App\Models\est\water\WwtpListModel;
use Illuminate\Http\Request;

class ListcontentController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = WwtpListModel::select('*')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/hse/action_incident')
                ->addColumn('download', function($row){
                    $btn = '<a href="javascript:void(0);" onClick="deleteData('.$row->id.')" class="btn font-15 btn-outline-danger btn-sm"><i class="las la-trash"></i></a>';
                     return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.est.water.wwtp');
    }
}
