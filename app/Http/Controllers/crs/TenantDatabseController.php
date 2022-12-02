<?php

namespace App\Http\Controllers\crs;

use App\Http\Controllers\Controller;
use App\Models\crs\TenantDatabaseModel;
use Illuminate\Http\Request;

class TenantDatabseController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = TenantDatabaseModel::all();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/crs/action_database')
                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }
    }


    public function store(Request $request){

        

        $name_file ='';
        if($request->input('id_db') != null){
            $request->validate([
                'company' => 'required',
                'type_product' => 'required'
            ]);
        }else{
            $request->validate([
                'company' => 'required',
                'type_product' => 'required'
            ]);
        }

        if($request->file('image') != null){
            $data = $request->file('image');
            $data->storeAs('public/crs/tenant_db', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('img');

        }

        $fm = TenantDatabaseModel::updateOrCreate(
            ['id' => $request->input('id_db')],
            [
            'company' => $request->input('company'),
            'type_product' => $request->input('type_product'),
            'start_date' => $request->input('start_date'),
            'occupied_factory' => $request->input('occupied_factory'),
            'contact_no' => $request->input('contact_no'),
            'pic' => $request->input('pic'),
            'designation' => $request->input('designation'),
            'email' => $request->input('email'),
            'hr_manager' => $request->input('hr_manager'),
            'remark' => $request->input('remark'),
            'total_employee' => $request->input('total_employee'),
            'image' => $name_file
            ]
            
        );

        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }


    public function show($id){
        $show = TenantDatabaseModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = TenantDatabaseModel::select('image')->where('id', $id)->first();
        unlink(storage_path('app/public/crs/tenant_db/'.$data->image));
        TenantDatabaseModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
