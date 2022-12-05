<?php

namespace App\Http\Controllers\ssd;

use App\Http\Controllers\Controller;
use App\Models\ssd\FsIncidentModel;
use Illuminate\Http\Request;

class FiresafetyController extends Controller
{
    //

    public function index(Request $request){
        if($request->ajax()){
            $sop = FsIncidentModel::select('*')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/ssd/action_incident_fs')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.ssd.firesafety');
    }

    public function store(Request $request){

        $request->validate([
            'fire_engine' => 'required',
            'waktu_keluar' => 'required',
            'waktu_tiba' => 'required',
        ]);
        

        $fm = FsIncidentModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'fire_engine' => $request->input('fire_engine'),
            'waktu_keluar' => $request->input('waktu_keluar'),
            'waktu_tiba' => $request->input('waktu_tiba'),
            'kembali' => $request->input('kembali'),
            'team_leader' => $request->input('team_leader'),
            'waktu_respon' => $request->input('waktu_respon'),
            'anggota_pemadam' => $request->input('anggota_pemadam'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'umur' => $request->input('umur'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'keterangan_korban' => $request->input('keterangan_korban'),
            'keterangan_umum' => $request->input('keterangan_umum'),
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function show($id){

        $show = FsIncidentModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        FsIncidentModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
