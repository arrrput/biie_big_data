<?php

namespace App\Http\Controllers\crs;

use App\Http\Controllers\Controller;
use App\Models\crs\ManPowerModel;
use App\Models\crs\RequestTenantModel;
use App\Models\DepartmentModel;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = RequestTenantModel::select('crs_tanant_request.*','department.name as department')
            ->join('department', 'department.id', 'crs_tanant_request.id_department')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/crs/action_tenant')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }

        $dept = DepartmentModel::all();
        return view('backend.crs.index', compact('dept'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //  validate field
        $request->validate([
            'tenant_name' => 'required',
            'description' => 'required',
            'target_completion' => 'required',
        ]);

        $fm = RequestTenantModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'name_tenant' => $request->input('tenant_name'),
            'description' => $request->input('description'),
            'id_progress' => $request->input('progress'),
            'id_department' => $request->input('id_department'),
            'target_completion' => $request->input('target_completion'),
            'status' => $request->input('status'),
            'received_by' => $request->input('received_by'),
            'pic' => $request->input('pic'),
            'root_cause' => $request->input('root_cause'),
            'correction' => $request->input('correction'),
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = RequestTenantModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        RequestTenantModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function listManPower(Request $request){
        if($request->ajax()){
            $sop = ManPowerModel::select('*')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/crs/action_manpower')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function storeManPower(Request $request)
    {
        // dd($request->all());
        //  validate field
        $request->validate([
            'total_tenant' => 'required',
            'total_employee' => 'required',
            'total_foreign_worker' => 'required',
        ]);

        $fm = ManPowerModel::updateOrCreate(
            ['id' => $request->input('id_manpower')],
            [
            'total_tenant' => $request->input('total_tenant'),
            'total_employee' => $request->input('total_employee'),
            'total_foreign_worker' => $request->input('total_foreign_worker'),
            
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function showMan($id){
        $show = ManPowerModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroyMan($id){
        ManPowerModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
