<?php

namespace App\Http\Controllers\gmo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\gmo\GmoFileModel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\gmo\GmoCategoryModel;
use Illuminate\Support\Facades\Auth;
use App\Models\gmo\GmoFileUploadModel;
use App\Models\gmo\GmoSubCategoryModel;

class GmoFileController extends Controller
{
    //
    public function index(){


        $gmo_kategori = GmoCategoryModel::all();
        return view('backend.gmo.index', compact('gmo_kategori'));
    }

    public function getSubCategory($param){
        $sc = GmoSubCategoryModel::where("id_category",$param)->pluck('id','name');
        return response()->json($sc);
    }

    public function store(Request $request){
        // dd($request);
        $date = Carbon::now()->toDateTimeString();
        $tglBln = Carbon::now()->format('ym');
        $t_req = GmoFileModel::count();
        
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'status_akses' => 'required',
            'kategori' => 'required',
            'sub_category' => 'required',
            'status_akses' => 'required',

        ]);

        if($request->kode_gmo == ''){
            if ($t_req == 0) {
                $urut = 10000001;
                $nomor = 'GMO-'. $tglBln . $urut;
            } else {
                $last_req = GmoFileModel::all()->last();
                $urut = (int) substr($last_req->kode_gmo, -8) + 1;
                $nomor = 'GMO-'.$tglBln . $urut;
            }
          
        }

        foreach($request->addMoreInputFields as $key => $value){
           
            $data = $request->file('addMoreInputFields.' . $key . '.name');
            $data->storeAs('public/gmo', $data->hashName());
            GmoFileUploadModel::create(
            [
                'kode_gmo' => $nomor,
                'file' => $data->hashName(),
                'name' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
            ]);
        }

        GmoFileModel::create(
            [
            'kode_gmo' => $nomor,
            'name' => $request->input('name'),
            'id_sub_category' => $request->input('sub_category'),
            'id_category' => $request->input('kategori'),
            'status_request' => $request->input('status'),
            'status_akses' => $request->input('status_akses'),
            'user_id' => Auth::user()->id,
            'due_date' => $request->input('due_date'),
            'schedule_reminder' => $request->input('reminder'),
        ]);

        return to_route('gmo')->with('message','Data berhasil disimpan.');
    }

    public function getFileAjax(){
        $data = GmoFileModel::select(['gmo_file.id','gmo_file.kode_gmo','gmo_file.name',
                                'gmo_category.name as category','gmo_sub_category.name as subcategory' 
                            ])
                            ->join('gmo_category', 'gmo_file.id_category', '=', 'gmo_category.id')
                            ->join('gmo_sub_category', 'gmo_file.id_sub_category', '=', 'gmo_sub_category.id')
                            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<button href="javascript:void(0)" onClick="editEnv('.$row->id.')" data-toggle="modal" data-target="#env-edit" class="btn btn-sm btn-primary"><i class="la la-edit"></i> </button>';
                       $btn =$btn.' <a href="javascript:void(0);" onClick="deleteFunc('.$row->id.')" class="btn btn-danger btn-sm"><i class="la la-trash"></i></a>';
                       
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function view($param){
        $show_gmo = DB::table('gmo_file')
                    ->select('gmo_file.id','gmo_file.kode_gmo','gmo_file.name','gmo_file.name','gmo_file.id_category','gmo_file.id_sub_category',
                            'gmo_file.created_at','gmo_category.name as category', 'gmo_sub_category.name as subcategory',
                            'gmo_file.status_request','gmo_file.status_akses','gmo_file.due_date')
                    ->join('gmo_category','gmo_category.id','gmo_file.id_category') 
                    ->join('gmo_sub_category','gmo_sub_category.id','gmo_file.id_sub_category')  
                    ->where('gmo_file.id','=', $param)
                    ->first();

        return Response()->json($show_gmo);
    }

    public function getDataAjax($param){
        $data = DB::table('gmo_file_upload')->select('id','kode_gmo','file','name')->where('kode_gmo', $param)->get();
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0);" onClick="deleteData('.$row->id.')" class="btn btn-danger btn-sm"><i class="la la-trash"></i></a>';
                       
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function destroy($id){

        $kd = GmoFileModel::select('kode_gmo')->where('id', $id)->first();
        $data = GmoFileUploadModel::select('*')->where('kode_gmo', $kd);
       
        foreach($data as $kode){
            unlink(public_path().'/storage/gmo/'.$kode->file);
            DB::table('gmo_file_upload')->where('kode_gmo', '=', $kode->id)->delete();
        }
        GmoFileModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);

    }

    public function deleteData($id){
        $data = GmoFileUploadModel::select('*')->where('id', $id)->first();

        GmoFileUploadModel::find($id)->delete($id);
        if(file_exists(public_path().'/storage/gmo/'.$data->file)){
            unlink(public_path().'/storage/gmo/'.$data->file);
        }
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function updateData(Request $request){
        $request->validate([
            'addMoreInputFields[*][kode_env]' => 'required',
            'addMoreInputFields[*][file]' => 'required|mimes:pdf,xlsx,xls,doc,docx|max:5024',
            'addMoreInputFields[*][name]' => 'required',
        ]);

        // dd($request);
        foreach($request->addMoreInputFields as $key => $value){
           
            $data = $request->file('addMoreInputFields.' . $key . '.file');
            $data->storeAs('public/gmo', $data->hashName());
            GmoFileUploadModel::create(
            [
                'kode_gmo' => $request->input('addMoreInputFields.' . $key . '.kode_gmo'),
                'file' => $data->hashName(),
                'name' => $request->input('addMoreInputFields.' . $key . '.name')
            ]);
            return to_route('gmo')->with('message','Data Berhasil di update.');
        }
    }
}
