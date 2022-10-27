<?php

namespace App\Http\Controllers\gmo;

use App\Exports\gmo\UserListExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\gmo\UserListModel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserListController extends Controller
{
    //

    public function index(Request $request){

        if($request->ajax()){
            $sop = UserListModel::select('gmo_user_list.*', 'department.name as department')
                ->join('department','gmo_user_list.department', 'department.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/gmo/action_list')
                  ->rawColumns(['action'])
                    ->addColumn('status_pakai', function($row){
                        if($row->tgl_kembalikan == null){
                            return 'Masih digunakan';
                        }else{
                            return 'Ready';
                        }
                })
                 ->addIndexColumn()
                 ->make(true);
        }
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        $gmo = UserListModel::updateOrCreate(
            ['id' => $request->input('id_user_list')],
            [
            'name' => $request->input('name'),
            'department' => $request->input('dept'),
            'email' => $request->input('email'),
            'ip' => $request->input('ip'),
            'internet' => $request->input('internet'),
            'jenis' => $request->input('jenis'),
            'lokasi' => $request->input('lokasi'),
            'tgl_serahkan' => $request->input('tgl_penyerahan'),
            'tgl_kembalikan' => $request->input('tgl_pengembalian')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $gmo, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){

        $show = UserListModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        UserListModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function export_excel()
	{
        $now = Carbon::now();
		return Excel::download(new UserListExport, 'User List IT-'.$now.'.xlsx');
	}

}
