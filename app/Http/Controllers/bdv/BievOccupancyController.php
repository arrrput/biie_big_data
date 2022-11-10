<?php

namespace App\Http\Controllers\bdv;

use App\Http\Controllers\Controller;
use App\Models\bdv\BievOccupancyModel;
use Illuminate\Http\Request;

class BievOccupancyController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = BievOccupancyModel::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/bdv/action_occ')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }

        return view('backend.bdv.index');
    }

    public function show($id){
        $show = BievOccupancyModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function store(Request $request)
    {
        //  validate field
             
        $request->validate([
            'room' => 'required',         

        ]);

        $fm = BievOccupancyModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'room' => $request->input('room'),
            'company' => $request->input('company'),
            'period' => $request->input('period'),
            'guest' => $request->input('guest'),
            'occupied' => $request->input('status'),
            'cekin_cekout' => $request->input('cekin_cekout'),
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function destroy($id){
        BievOccupancyModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
