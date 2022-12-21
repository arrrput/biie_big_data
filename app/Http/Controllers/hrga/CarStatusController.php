<?php

namespace App\Http\Controllers\hrga;

use App\Http\Controllers\Controller;
use App\Models\hrga\CarStatusModel;
use Illuminate\Http\Request;

class CarStatusController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = CarStatusModel::select('*')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/hrga/action_car')
                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }
    }


    public function store(Request $request)
    {
        //  validate field
        $request->validate([
            'car_name' => 'required',
            'plat_no' => 'required',
            

        ]);

        $fm = CarStatusModel::updateOrCreate(
            ['id' => $request->input('id_car')],
            [
            'name' => $request->input('name_user_car'),
            'car_name' => $request->input('car_name'),
            'plat_no' => $request->input('plat_no')
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function destroy($id){
        CarStatusModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function show($id){
        $show = CarStatusModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }
}
