<?php

namespace App\Http\Controllers\est;

use App\Exports\MetereadingExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\est\MetereadingModel;
use Maatwebsite\Excel\Facades\Excel;

class MetereadingController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            $sop = MetereadingModel::select('table_est_satuan_metereading.name as type','table_estate_metereading.id','table_estate_metereading.location','start_date',
            'end_date','table_estate_metereading.electricity_consump','table_estate_metereading.water_consump')
                ->join('table_est_satuan_metereading','id_type' ,'table_est_satuan_metereading.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addIndexColumn()
                  ->addColumn('action', 'backend/est/action_meter')
                  ->rawColumns(['action'])
                 ->addColumn('status', function($row){
                     if($row->status_vacant == 1){
                         return 'OCCUPPIED';
                     }else if($row->status_vacant == 2){
                        return 'VACANT';
                     }
                 })
                 ->addColumn('kwh', function($row){
                   return number_format($row->electricity_consump).' Kwh';
                   
                    })
                ->addColumn('m3', function($row){
                    return number_format($row->water_consump).' m3';
                        
                })
                 ->addIndexColumn()
                 ->make(true);
        }
        
    }


    public function store(Request $request){
       
        $request->validate([
            'type_meter' => 'required',
            'name' => 'required'
        ]);

        $fm = MetereadingModel::updateOrCreate(
            ['id' => $request->id_meter],
            [
            'location' => $request->input('name'),
            'id_type' => $request->input('type_meter'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'electricity_consump' => $request->input('electricity_consump'),
            'water_consump' => $request->input('water_consump')
            ]
            
        );
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'Data successfully!'], 200);
    }

    public function listShow($id){

        $show = MetereadingModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function export_excel()
	{
        $now = Carbon::now();
		return Excel::download(new MetereadingExport, 'Metereanding-'.$now.'.xlsx');
	}
}
