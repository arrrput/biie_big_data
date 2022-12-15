<?php

namespace App\Http\Controllers\est\ph;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\est\ph\DwSwitchouseModel;

class DwSwitchouseController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = DwSwitchouseModel::select('*' )
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/est/ph/action_ph_sw')
                    // ->editColumn('created_at', function($data){ 
                    //     $formatedDate = Carbon::createFromFormat('Y-m-d', $data->created_at)->format('d M Y'); 
                    //     return $formatedDate; 
                    //     })
                   ->addColumn('drawing','backend/est/ph/download_sw')
                  ->rawColumns(['action','drawing'])
                  ->addIndexColumn()
                  ->make(true);
        }
    }

    public function store(Request $request){
        // dd($request->all());

        //  validate field
        $name_file ='';
        $request->validate([
            'name' => 'required',
            'substation' => 'required',
        ]);

        if($request->file('document_sh') != null){
            $data = $request->file('document_sh');
            $data->storeAs('public/est/ph/sh', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc_sh');
        }

        $fm = DwSwitchouseModel::updateOrCreate(
            ['id' => $request->input('id_sh')],
            [
            'id_user' => Auth::user()->id,
            'name' => $request->input('name'),
            'substation' => $request->input('substation'),
            'merk' => $request->input('merk'),
            'outgoing' => $request->input('outgoing'),
            'breaker' => $request->input('breaker'),
            'operating_voltage' => $request->input('operating_voltage'),
            'incoming' => $request->input('incoming'),
            'manual_book' => $request->input('manual_book'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = DwSwitchouseModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = DwSwitchouseModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/est/ph/sh/'.$data->document));
        DwSwitchouseModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function download($file){
        $filePath = public_path("storage/est/ph/sh/".$file);
    	//$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $file);
    }
}
