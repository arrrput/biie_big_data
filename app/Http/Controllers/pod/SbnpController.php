<?php

namespace App\Http\Controllers\pod;

use App\Http\Controllers\Controller;
use App\Models\pod\SbnpModel;
use Illuminate\Http\Request;

class SbnpController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = SbnpModel::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/pod/action_snbp')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }
    }

    public function store(Request $request)
    {
        
        //  validate field
        $request->validate([
            'name_location' => 'required',
            'position' => 'required',
            'type' => 'required',
        ]);

       

        $fm = SbnpModel::updateOrCreate(
            ['id' => $request->input('id_sbnp')],
            [
            'name_location' => $request->input('name_location'),
            'position' => html_entity_decode($request->input('position')),
            'dsi' => $request->input('dsi'),
            'type' => $request->input('type'),
            'power_source' => $request->input('power_source'),
            'color_light' => $request->input('color_light'),
            'beacon_construction' => $request->input('beacon_construction'),
            'construction_height' => $request->input('construction_height'),
            'construction_color' => $request->input('construction_color'),
            'visible_distance' => $request->input('visible_distance'),
            'remark' => $request->input('remark')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = SbnpModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        SbnpModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
