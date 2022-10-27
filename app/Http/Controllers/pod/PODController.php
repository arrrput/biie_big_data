<?php

namespace App\Http\Controllers\pod;

use App\Http\Controllers\Controller;
use App\Models\pod\ShipArriveModel;
use Illuminate\Http\Request;

class PODController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            $sop = ShipArriveModel::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/pod/action_ship')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }

        return view('backend.pod.index');
    }

    public function store(Request $request)
    {
        //  validate field
        $request->validate([
            'name_ship' => 'required',
            'gt_flag' => 'required',
            'port_origin' => 'required',
        ]);


        $fm = ShipArriveModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'name_ship' => $request->input('name_ship'),
            'gt_flag' => $request->input('gt_flag'),
            'gt' => $request->input('gt'),
            'departure' => $request->input('departure'),
            'date_arrive' => $request->input('date_arrive'),
            'port_origin' => $request->input('port_origin'),
            'demolish' => $request->input('demolish'),
            'debarkation' => $request->input('debarkation'),
            'type_of_goods' => $request->input('type_of_goods'),
            'destinantion_port' => $request->input('destination_port'),
            'payload' => $request->input('payload'),
            'embarkation' => $request->input('embarkation'),
            'trayek_status_l_t' => $request->input('trayek_status_l_t'),
            'trayek_status_m_ch_k' => $request->input('trayek_status_m_ch_k'),
            'validate_period_rpt' => $request->input('validate_period'),
            'port_location' => $request->input('port_location')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function destroy($id){
        ShipArriveModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function show($id){
        $show = ShipArriveModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }
}
