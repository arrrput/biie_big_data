<?php

namespace App\Http\Controllers\ssd;

use App\Http\Controllers\Controller;
use App\Models\ssd\FsFireAlarmModel;
use Illuminate\Http\Request;

class FireAlarmController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = FsFireAlarmModel::select('*')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/ssd/action_fire_alarm')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function store(Request $request){

        $request->validate([
            'lokasi' => 'required',
            'break_glass' => 'required',
            'smoke_detector' => 'required',
        ]);
        

        $fm = FsFireAlarmModel::updateOrCreate(
            ['id' => $request->input('id_alarm')],
            [
            'lokasi' => $request->input('lokasi'),
            'break_glass' => $request->input('break_glass'),
            'smoke_detector' => $request->input('smoke_detector'),
            'detector_panas' => $request->input('detector_panas'),
            'alarm' => $request->input('alarm_1'),
            'jumlah' => $request->input('jumlah'),
            'inspection' => $request->input('inspection'),
            'keterangan' => $request->input('keterangan'),
            
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function show($id){

        $show = FsFireAlarmModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        FsFireAlarmModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
