<?php

namespace App\Http\Controllers\gmo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\gmo\ListInventory;
use App\Exports\gmo\InventoryExport;
use App\Http\Controllers\Controller;
use App\Models\gmo\GmoCategoryModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\gmo\JenisKomputerModel;

class GmoListController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = ListInventory::select('gmo_list_jenis_komputer.name','gmo_list.id','merk','no_seri' ,'no_lisensi','processor','ram','ssd','hdd','keterangan')
                ->join('gmo_list_jenis_komputer' ,'gmo_list.id_jenis_komputer','gmo_list_jenis_komputer.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/gmo/action_inventory')
                  ->rawColumns(['action'])
                 ->addColumn('jenis_perangkat', function($row){
                     return $row->name.'-'.$row->merk.' '.$row->no_seri;
                 })
                 ->addIndexColumn()
                 ->make(true);
        }

        $dept = DepartmentModel::all();
        $list = JenisKomputerModel::select('*')->get();
        $gmo_kategori = GmoCategoryModel::all();
        return view('backend.gmo.list', compact('list','dept','gmo_kategori'));
    }

    public function store(Request $request){
        
        $request->validate([
            'category' => 'required',
        ]);

        $gmo = ListInventory::updateOrCreate(
            ['id' => $request->id],
            [
            'id_jenis_komputer' => $request->input('category'),
            'merk' => $request->input('merk'),
            'no_seri' => $request->input('no_seri'),
            'no_lisensi' => $request->input('no_licensi'),
            'processor' => $request->input('processor'),
            'ram' => $request->input('ram'),
            'ssd' => $request->input('ssd'),
            'hdd' => $request->input('hdd'),
            'keterangan' => $request->input('keterangan')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $gmo, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){

        $show = ListInventory::select('gmo_list.*','gmo_list_jenis_komputer.name')
                    ->where('gmo_list.id',$id)
                    ->join('gmo_list_jenis_komputer', 'gmo_list_jenis_komputer.id','gmo_list.id_jenis_komputer')
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        ListInventory::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function export_excel()
	{
        $now = Carbon::now();
		return Excel::download(new InventoryExport, 'List Inventory IT-'.$now.'.xlsx');
	}
}
