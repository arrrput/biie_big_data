<?php

namespace App\Http\Controllers\aml;

use App\Http\Controllers\Controller;
use App\Models\aml\PermitDocumentModel;
use App\Models\aml\PermitTypeModel;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = PermitDocumentModel::select('aml_permit_document.*', 'aml_permit_owner.name as owner_name', 'aml_permit_type.name as type_name')
                ->join('aml_permit_owner', 'aml_permit_document.permit_owner', 'aml_permit_owner.id')
                ->join('aml_permit_type', 'aml_permit_document.permit_type', 'aml_permit_type.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/aml/action_permit')
                  ->addColumn('download','backend/aml/download_permit')
                  ->rawColumns(['action','download'])
                  ->addIndexColumn()
                  ->make(true);
        }
    }

    public function getPermitType($param){
        if($param == 1){
            $sc = PermitTypeModel::all()->pluck('id','name');
            return response()->json($sc);
        }else{
            $sc = PermitTypeModel::where('id_permit_owner',0)->pluck('id','name');
            return response()->json($sc);
        }
        
    }

    public function store(Request $request)
    {
        //  validate field

        // dd($request->all());
        $name_file ='';
        $request->validate([
            'name' => 'required',
            'type_contract' => 'required'
        ]);

        if($request->file('document_permit') != null){
            $data = $request->file('document_permit');
            $data->storeAs('public/aml/permit', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('document_permit');
        }

        $fm = PermitDocumentModel::updateOrCreate(
            ['id' => $request->input('id_permit')],
            [
            'name' => $request->input('name'),
            'type_contract' => $request->input('type_contract'),
            'permit_owner' => $request->input('id_permit_owner'),
            'permit_type' => $request->input('id_permit_type'),
            'start_date' => $request->input('start_date_permit'),
            'end_date' => $request->input('end_date_permit'),
            'end_date' => $request->input('end_date_permit'),
            'issued_date' => $request->input('issued_date_permit'),
            'description' => $request->input('description_permit'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = PermitDocumentModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function downloadPermit($file){
        $filePath = public_path("storage/aml/permit/".$file);
    	//$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $file);
    }
}
