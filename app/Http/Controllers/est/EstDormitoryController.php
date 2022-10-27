<?php

namespace App\Http\Controllers\est;

use Illuminate\Http\Request;
use App\Exports\FactoryExport;
use App\Exports\DormitoryExport;
use App\Http\Controllers\Controller;
use App\Models\est\DormitoryImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\est\EstDormitoryModel;
use Illuminate\Support\Facades\Session;
use App\Models\est\EstDormCategoryModel;

class EstDormitoryController extends Controller
{
    //

    public function index(Request $request){
        $sop = EstDormitoryModel::select('table_estate_dormitory.block','table_estate_dormitory.unit','name_tenant',
                        'table_estate_dormitory.hod','table_estate_dormitory.id','status_vacant','vacant','table_est_block_dorm.name as name_block')
            ->join('table_est_block_dorm','table_estate_dormitory.block' ,'table_est_block_dorm.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                 ->addIndexColumn()
                  ->addColumn('action', 'backend/est/action_dorm')
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

    public function store(Request $request){
        
        $request->validate([
            'block' => 'required',
            'occupied' => 'required',
        ]);

        $fm = EstDormitoryModel::updateOrCreate(
            ['id' => $request->id_dorm],
            [
            'block' => $request->input('block'),
            'unit' => $request->input('unit'),
            'name_tenant' => $request->input('tenant'),
            'status_vacant' => $request->input('occupied'),
            'hod' => $request->input('hod'),
            'vacant' => $request->input('vacant'),
            'remark' => $request->input('remark')
            ]
            
        );
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function listShow($id){

        $show = EstDormitoryModel::select('*')
                    ->where('table_estate_dormitory.id',$id)
                    ->join('table_est_block_dorm', 'block','table_est_block_dorm.id')
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        EstDormitoryModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function export_excel()
	{
		return Excel::download(new DormitoryExport, 'Dormitory.xlsx');
	}

    public function import_excel(Request $request) 
	{
       
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		Excel::import(new DormitoryImport, $request->file('file')->store('temp') );
 
		Session::flash('success','Data Dormitory Berhasil Diimport!');
 
		return redirect('/estate/list/factory');
	}
    
}
