<?php

namespace App\Http\Controllers\pod;

use App\Http\Controllers\Controller;
use App\Models\pod\FacilityPermitModel;
use Illuminate\Http\Request;

class PortFacilityController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $sop = FacilityPermitModel::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/pod/action_port')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }
    }

    public function store(Request $request)
    {
        //  validate field
        $request->validate([
            'license_no' => 'required',
            
        ]);

       

        $fm = FacilityPermitModel::updateOrCreate(
            ['id' => $request->input('id_port')],
            [
            'license_no' => $request->input('license_no'),
            'date_issue' => html_entity_decode($request->input('date_issue')),
            'validity_period' => $request->input('validity_period'),
            'permission_type' => $request->input('permission_type'),
            'instantion_permit' => $request->input('instantion_permit')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = FacilityPermitModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        FacilityPermitModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
