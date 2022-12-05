<?php

namespace App\Http\Controllers\hse;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\hse\HseIncidentModel;
use Illuminate\Http\Request;

class HseController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            $sop = HseIncidentModel::select('hse_incident_report.*','department.name as department')
            ->join('department', 'department.id', 'hse_incident_report.id_department')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/hse/action_incident')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $dept = DepartmentModel::all();
        return view('backend.hse.index', compact('dept'));
    }

    public function store(Request $request){

       
        $request->validate([
            'nama' => 'required',  
            'tgl' => 'required', 
            'jam' => 'required', 
            'department' => 'required',        

        ]);
       

        $fm = HseIncidentModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'nama' => $request->input('nama'),
            'tgl' => $request->input('tgl'),
            'jam' => $request->input('jam'),
            'id_department' => $request->input('department'),
            'kategori_kecelakaan' => $request->input('kategori_kecelakaan'),
            'penyebab' => $request->input('penyebab'),
            'bagian_terluka' => $request->input('bagian_terluka'),
            'alat_penyebab' => $request->input('alat_penyebab'),
            'kronologi' => $request->input('kronologi'),
            'analisa_kejadian' => $request->input('analisa_kejadian'),
            'tindakan_perbaikan' => $request->input('tindakan_perbaikan'),
            'tindakan_pencegahan' => $request->input('tindakan_pencegahan'),
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function show($id){
        $show = HseIncidentModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        HseIncidentModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
