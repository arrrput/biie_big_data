<?php

namespace App\Http\Controllers\pod;

use App\Http\Controllers\Controller;
use App\Models\pod\BeaconReportModel;
use Illuminate\Http\Request;

class BeaconController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = BeaconReportModel::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/pod/action_abnormal')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }
    }

    public function store(Request $request)
    {
        
        //  validate field
        $request->validate([
            'dsi_abnormal' => 'required',
            'type_abnormal' => 'required',
        ]);

       

        $fm = BeaconReportModel::updateOrCreate(
            ['id' => $request->input('id_abnormal')],
            [
            'dsi' => $request->input('dsi_abnormal'),
            'location_name' => $request->input('location_name_abnormal'),
            'type' => $request->input('type_abnormal'),
            'power_source' => $request->input('power_source_abnormal'),
            'root_cause' => $request->input('root_cause_abnormal'),
            'number_day' => $request->input('number_day_abnormal'),
            'remark' => $request->input('remark_abnormal'),
            
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = BeaconReportModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        BeaconReportModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
