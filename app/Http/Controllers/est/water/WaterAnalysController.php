<?php

namespace App\Http\Controllers\est\water;

use App\Http\Controllers\Controller;
use App\Models\est\water\WaterAnalysModel;
use Illuminate\Http\Request;

class WaterAnalysController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = WaterAnalysModel::select('*')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/est/water/action_wia')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function store(Request $request){
        if($request->ajax()){
            // dd($request->all());
            $request->validate([
                'parameter' => 'required',
                'unit' => 'required',    
            ]);
    
            $fm = WaterAnalysModel::updateOrCreate(
                ['id' => $request->input('id_wia')],
                [
                'parameter' => $request->input('parameter'),
                'unit' => $request->input('unit'),
                'result' => $request->input('result'),
                'standart_max' => $request->input('standart_max'),
                'method' => $request->input('method')
                ]
                
            );
            
            return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
        }
    }


    public function show($id){
        $show = WaterAnalysModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }


    public function destroy($id){
        WaterAnalysModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
