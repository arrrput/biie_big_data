<?php

namespace App\Http\Controllers\pod;

use App\Http\Controllers\Controller;
use App\Models\pod\ExportCargoModel;
use Illuminate\Http\Request;

class ExportCargoController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = ExportCargoModel::select('pod_export_cargo.*','pod_container_type.name as container')
            ->join('pod_container_type', 'pod_export_cargo.export_container','pod_container_type.id')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/pod/action_export')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }
    }

    public function store(Request $request)
    {
        
        //  validate field
        $request->validate([
            'export_container' => 'required',
            'tonnage_in_loose_export' => 'required',
            'tonnage_cargo_export' => 'required',
        ]);

        $fillable = ['import_container', 'tonnage_in_loose', 'tonnage_cargo', 'total_teus',
            'total_package', 'total'];

        $fm = ExportCargoModel::updateOrCreate(
            ['id' => $request->input('id_export')],
            [
            'export_container' => $request->input('export_container'),
            'tonnage_in_loose' => $request->input('tonnage_in_loose_export'),
            'tonnage_cargo' => $request->input('tonnage_cargo_export'),
            'total_teus' => $request->input('total_teus_export'),
            'total_package' => $request->input('total_package_export'),
            'total' => $request->input('total_export')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = ExportCargoModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        ExportCargoModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }


}
