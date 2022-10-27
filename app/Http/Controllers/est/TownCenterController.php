<?php

namespace App\Http\Controllers\est;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\TownCenterExport;
use App\Http\Controllers\Controller;
use App\Models\est\TownCenterImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\est\EstTownCenterModel;
use Illuminate\Support\Facades\Session;

class TownCenterController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            $sop = EstTownCenterModel::select('table_est_townc_type.name as type','table_estate_townc.id','stall_no','name_stall','hod',
                        'remark','id_type','table_est_townc_type.name as name_block')
                ->join('table_est_townc_type','id_type' ,'table_est_townc_type.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                    ->addIndexColumn()
                  ->addColumn('action', 'backend/est/action_town')
                  ->rawColumns(['action'])
                 ->addColumn('status', function($row){
                     if($row->status_vacant == 1){
                         return 'OCCUPPIED';
                     }else if($row->status_vacant == 2){
                        return 'VACANT';
                     }
                 })
                 ->addIndexColumn()
                 ->make(true);
        }
        
    }


    public function store(Request $request){
        
        $request->validate([
            'type' => 'required',
        ]);

        $fm = EstTownCenterModel::updateOrCreate(
            ['id' => $request->id_town],
            [
            'id_type' => $request->input('type'),
            'stall_no' => $request->input('stall_no'),
            'name_stall' => $request->input('name_stall'),
            'hod' => $request->input('hod_town'),
            'remark' => $request->input('remark_town')
            ]
            
        );
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function listShow($id){

        $show = EstTownCenterModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        EstTownCenterModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
    public function export_excel()
	{
        $now = Carbon::now();
		return Excel::download(new TownCenterExport, 'Towncenter-'.$now.'.xlsx');
	}


    public function import_excel(Request $request) 
	{
       
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		Excel::import(new TownCenterImport, $request->file('file')->store('temp') );
 
		Session::flash('success','Data Dormitory Berhasil Diimport!');
 
		return redirect('/estate/list/factory');
	}


}
