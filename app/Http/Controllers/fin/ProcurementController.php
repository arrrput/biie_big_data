<?php

namespace App\Http\Controllers\fin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\fin\ProcurementModel;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            $sop = ProcurementModel::select('*')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/fin/pro_delete')
                  ->addColumn('download','backend/fin/download_pro')
                  ->rawColumns(['action','download'])
                  
                 ->addIndexColumn()
                 ->make(true);
        }

        $dept = DepartmentModel::all();

        return view('backend.fin.procurement', compact('dept'));
    }

    public function store(Request $request){
        // dd($request->all());
        $name_file ='';
        if($request->input('id') != null){
            $request->validate([
                'no_po' => 'required',
                'no_pr' => 'required'
            ]);
        }else{
            $request->validate([
                'no_po' => 'required',
                'no_pr' => 'required'
            ]);
        }

        if($request->file('document') != null){
            $data = $request->file('document');
            $data->storeAs('public/fin/procurement', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc');

        }

        $fm = ProcurementModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'no_pr' => $request->input('no_pr'),
            'no_po' => $request->input('no_po'),
            'no_do' => $request->input('no_do'),
            'status' => $request->input('status'),
            'category' => $request->input('category'),
            'id_department' => $request->input('id_department'),
            'no_inv' => $request->input('no_inv'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function show($id){
        $show = ProcurementModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = ProcurementModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/fin/procurement/'.$data->document));
        ProcurementModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function downloadDoc($file){
        $filePath = public_path("storage/fin/procurement/".$file);
    	return response()->download($filePath, $file);
    }
}
