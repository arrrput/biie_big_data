<?php

namespace App\Http\Controllers\hse;

use App\Http\Controllers\Controller;
use App\Models\hse\HseP3kModel;
use Illuminate\Http\Request;

class P3KController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = HseP3kModel::select('*')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/hse/action_p3k')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function store(Request $request){

       
        $request->validate([
            'no_p3k' => 'required',  
            'lokasi_pk' => 'required', 
            'nama_pk' => 'required', 
            'contact_pk' => 'required',        

        ]);

        $fm = HseP3kModel::updateOrCreate(
            ['id' => $request->input('id_pk')],
            [
            'no_p3k' => $request->input('no_p3k'),
            'lokasi' => $request->input('lokasi_pk'),
            'tgl' => $request->input('tgl_pk'),
            'nama' => $request->input('nama_pk'),
            'contact' => $request->input('contact_pk'),
            ]
            
        );
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = HseP3kModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        HseP3kModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
