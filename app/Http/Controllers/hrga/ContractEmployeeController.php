<?php

namespace App\Http\Controllers\hrga;

use App\Http\Controllers\Controller;
use App\Models\hrga\ContractEmployeeModel;
use App\Models\hrga\EmployeeModel;
use Illuminate\Http\Request;

class ContractEmployeeController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = ContractEmployeeModel::select('*')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/hrga/action_contract')
                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }
    }

    public function getEmployees(Request $request){

        $data = EmployeeModel::select("name")
        ->where('name', 'LIKE', '%'. $request->get('query'). '%')
        ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        //  validate field
        $request->validate([
            'name_contract' => 'required',
            'date_end' => 'required',

        ]);

        $fm = ContractEmployeeModel::updateOrCreate(
            ['id' => $request->input('id_contract')],
            [
            'name' => $request->input('name_contract'),
            'date_end' => $request->input('date_end')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = ContractEmployeeModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }
    
    public function destroy($id){
        ContractEmployeeModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
