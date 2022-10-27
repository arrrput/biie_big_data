<?php

namespace App\Http\Controllers\fin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\fin\HalalModel;
use App\Http\Controllers\Controller;

class HalalController extends Controller
{
    //

    public function index(Request $request){
        if($request->ajax()){
            $sop = HalalModel::select('*')
                ->orderBy('due_date','DESC')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/fin/action_halal')
                  ->addColumn('download','backend/fin/download_halal')
                  ->rawColumns(['action','download'])
                  
                 ->addIndexColumn()
                 ->make(true);
        }

        $data = HalalModel::select('*')
        ->whereDate('due_date','>=', Carbon::today())
        ->get();
            $now = Carbon::now();
            $list_date = [];
            $b=0;
            $key=0;
            foreach($data as $date){
                $beda_hari = $now->diffInDays($date->due_date);
                if($beda_hari < $date->reminder  ){
                    $list_date[$b] = ['title' => $date->name, 'selisih_hari' => $beda_hari, 
                    'due_date' => Carbon::parse($date->due_date)->diffForHumans() ];
                    $b++;
                }
                $key++;
            }
            $n = count($list_date);

        return view('backend.fin.halal', compact('n','list_date'));
    }


    public function store(Request $request)
    {
        //  validate field

        // dd($request->all());
        $name_file ='';
        if($request->input('id') != null){
            $request->validate([
                'title' => 'required'
            ]);
        }else{
            $request->validate([
                'title' => 'required',
                'document' => 'required'
            ]);
        }

        if($request->file('document') != null){
            $data = $request->file('document');
            $data->storeAs('public/fin/file', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc');

        }

        $fm = HalalModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'name' => $request->input('title'),
            'due_date' => $request->input('date'),
            'reminder' => $request->input('reminder'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = HalalModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = HalalModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/fin/file/'.$data->document));
        HalalModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function downloadDoc($file){
        $filePath = public_path("storage/fin/file/".$file);
    	//$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $file);
    }
}
