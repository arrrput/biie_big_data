<?php

namespace App\Http\Controllers\est\st;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\est\st\SubstationModel;

class SubstationController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = SubstationModel::select('*' )
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/est/ph/action_st')
                    // ->editColumn('created_at', function($data){ 
                    //     $formatedDate = Carbon::createFromFormat('Y-m-d', $data->created_at)->format('d M Y'); 
                    //     return $formatedDate; 
                    //     })
                   ->addColumn('drawing','backend/est/ph/download_st')
                  ->rawColumns(['action','drawing'])
                  ->addIndexColumn()
                  ->make(true);
        }
    }

    public function store(Request $request){

        if($request->has('factory')){
            foreach($request->input('factory') as $data){
                $data_factory[] = $data; 
            }
        }

        if($request->has('transformer')){
            foreach($request->input('transformer') as $data){
                $data_transformer[] = $data; 
            }
        }

        if($request->file('document_st') != null){
            $data = $request->file('document_st');
            $data->storeAs('public/est/ph/st', $data->hashName());
            $name_file = $data->hashName();

        }else{
            $name_file = $request->input('doc_st');
        }

        $fm = SubstationModel::updateOrCreate(
            ['id' => $request->input('id_st')],
            [
            'id_user' => Auth::user()->id,
            'name' => $request->input('name_st'),
            'merk' => $request->input('merk_st'),
            'outgoing' => $request->input('outgoing_st'),
            'incoming' => $request->input('incoming_st'),
            'factory' => json_encode($data_factory),
            'transformer_capacity' => json_encode($data_transformer),
            'manual_book' => $request->input('manual_book'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function show($id){
        $show = SubstationModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = SubstationModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/est/ph/st/'.$data->document));
        SubstationModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function download($file){
        $filePath = public_path("storage/est/ph/st/".$file);

    	return response()->download($filePath, $file);
    }
}
