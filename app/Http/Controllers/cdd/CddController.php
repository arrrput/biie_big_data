<?php

namespace App\Http\Controllers\cdd;

use App\Http\Controllers\Controller;
use App\Models\cdd\CddActivity;
use App\Models\cdd\CddProposalStatus;
use Illuminate\Http\Request;

class CddController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = CddProposalStatus::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/cdd/action_proposal')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }

        return view('backend.cdd.index');
    }

    public function show($id){
        $show = CddProposalStatus::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function store(Request $request)
    {
        //  validate field

       
        $request->validate([
            'name' => 'required',
            'pic' => 'required',
            

        ]);

        $fm = CddProposalStatus::updateOrCreate(
            ['id' => $request->input('id_dorm')],
            [
            'name' => $request->input('name'),
            'pic' => $request->input('pic'),
            'donation' => $request->input('donation')
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function destroy($id){
        CddProposalStatus::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function activity(Request $request){
        if($request->ajax()){
            $sop = CddActivity::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/cdd/action_activity')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }
    }


    public function storeAct(Request $request)
    {
        //  validate field

       
        $request->validate([
            'activity' => 'required',
            'pic_act' => 'required',
            

        ]);

        $fm = CddActivity::updateOrCreate(
            ['id' => $request->input('id_act')],
            [
            'activity' => $request->input('activity'),
            'pic' => $request->input('pic_act'),
            'date' => $request->input('date'),
            'budget' => $request->input('budget'),
            'remark' => $request->input('remark'),
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function showAct($id){
        $show = CddActivity::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroyAct($id){
        CddActivity::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

}
