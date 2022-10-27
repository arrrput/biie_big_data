<?php

namespace App\Http\Controllers\pod;

use App\Http\Controllers\Controller;
use App\Models\pod\ImportCargoModel;
use Illuminate\Http\Request;

class ImportCargoController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = ImportCargoModel::select('*')
            ->get();

        $datatables =  datatables()->of($sop);
        return $datatables
              ->addColumn('action', 'backend/pod/action_import')
              ->rawColumns(['action'])
              ->addIndexColumn()
              ->make(true);
        }
    }

    public function store(Request $request)
    {
        
        //  validate field
        $request->validate([
            'import_container' => 'required',
            'tonnage_in_loose' => 'required',
            'tonnage_cargo' => 'required',
        ]);

        $fillable = ['import_container', 'tonnage_in_loose', 'tonnage_cargo', 'total_teus',
            'total_package', 'total'];

        $fm = ImportCargoModel::updateOrCreate(
            ['id' => $request->input('id_import')],
            [
            'import_container' => $request->input('import_container'),
            'tonnage_in_loose' => $request->input('tonnage_in_loose'),
            'tonnage_cargo' => $request->input('tonnage_cargo'),
            'total_teus' => $request->input('total_teus'),
            'total_package' => $request->input('total_package'),
            'total' => $request->input('total')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = ImportCargoModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        ImportCargoModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
