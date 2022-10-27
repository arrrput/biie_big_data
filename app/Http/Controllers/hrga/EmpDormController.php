<?php

namespace App\Http\Controllers\hrga;

use App\Http\Controllers\Controller;
use App\Models\hrga\EmployeeDormModel;
use Illuminate\Http\Request;

class EmpDormController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = EmployeeDormModel::select('hrga_dorm.*','department.name as department')
                ->join('department','hrga_dorm.id_dept','department.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/hrga/dorm_action')
                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }
    }

    public function show($id){
        $show = EmployeeDormModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function store(Request $request)
    {
        //  validate field

       
        $request->validate([
            'blok' => 'required',
            'unit' => 'required',
            

        ]);

        $fm = EmployeeDormModel::updateOrCreate(
            ['id' => $request->input('id_dorm')],
            [
            'blok' => $request->input('blok'),
            'unit' => $request->input('unit'),
            'name' => $request->input('name'),
            'id_dept' => $request->input('id_dept'),
            'room_no' => $request->input('room_no')
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function destroy($id){
        EmployeeDormModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
