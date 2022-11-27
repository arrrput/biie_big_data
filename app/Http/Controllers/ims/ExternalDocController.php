<?php

namespace App\Http\Controllers\ims;

use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\ims\HirarkiDocModel;
use App\Http\Controllers\Controller;
use App\Models\ims\ExternalDocModel;

class ExternalDocController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = ExternalDocModel::select('ims_external_doc.*', 'ims_hirarki_doc.name as hirarki')
            ->join('ims_hirarki_doc','ims_external_doc.hirarki_doc', 'ims_hirarki_doc.id')   
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/ims/action_external')
                ->addColumn('download', 'backend/ims/download_external')
                ->rawColumns(['action','download'])
                ->addIndexColumn()
                ->make(true);
        }
        $dept = DepartmentModel::all();
        $hirarki = HirarkiDocModel::all();
        return view('backend.ims.external_doc', compact('dept', 'hirarki'));
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
            $data->storeAs('public/ims/external-doc', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc');
        }

        $fm = ExternalDocModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'no_document' => $request->input('no_document'),
            'title' => $request->input('title'),
            'hirarki_doc' => $request->input('hirarki_doc'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = ExternalDocModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function downloadMaster($file){
        $filePath = public_path("storage/ims/external-doc/".$file);

    	return response()->download($filePath, $file);
    }

    public function destroy($id){
        $data = ExternalDocModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/ims/external-doc/'.$data->document));
        ExternalDocModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
