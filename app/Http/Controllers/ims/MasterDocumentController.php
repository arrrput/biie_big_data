<?php

namespace App\Http\Controllers\ims;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\ims\HirarkiDocModel;
use App\Models\ims\MasterDocumentModel;
use Illuminate\Http\Request;

class MasterDocumentController extends Controller
{
    //

    public function index(Request $request){
        if($request->ajax()){
            $sop = MasterDocumentModel::select('ims_master_document.*', 'department.name as department', 'ims_hirarki_doc.name as hirarki')
            ->join('ims_hirarki_doc','ims_master_document.hirarki_doc', 'ims_hirarki_doc.id')   
            ->join('department','ims_master_document.id_dept', 'department.id')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/ims/action_master')
              ->addColumn('download', 'backend/ims/download_master')
              ->rawColumns(['action','download'])
              ->addIndexColumn()
              ->make(true);
        }

        $dept = DepartmentModel::all();
        $hirarki = HirarkiDocModel::all();
        return view('backend.ims.index', compact('dept','hirarki'));
    }


    public function store(Request $request)
    {
        //  validate field
        $name_file ='';
        $request->validate([
            'no_document' => 'required',
            'title' => 'required',
            'hirarki_doc' => 'required',
        ]);

        if($request->file('document') != null){
            $data = $request->file('document');
            $data->storeAs('public/ims/masterdocument', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc');
        }

        $fm = MasterDocumentModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'no_document' => $request->input('no_document'),
            'title' => $request->input('title'),
            'hirarki_doc' => $request->input('hirarki_doc'),
            'id_dept' => $request->input('id_dept'),
            'remark' => $request->input('remark'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = MasterDocumentModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = MasterDocumentModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/ims/masterdocument/'.$data->document));
        MasterDocumentModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }


    public function downloadMaster($file){
        $filePath = public_path("storage/ims/masterdocument/".$file);
    	//$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $file);
    }
}
