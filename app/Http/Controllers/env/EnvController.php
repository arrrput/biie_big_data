<?php

namespace App\Http\Controllers\env;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Env\EnvCategory;
use App\Models\Env\EnvFileModel;
use Yajra\DataTables\DataTables;
use App\Models\Env\EnvSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Env\EnvFileUploadModel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EnvController extends Controller
{
    //

    public function index(){

        $env_kategori = EnvCategory::all();
        $list = EnvFileModel::select(['env_file.*',
                                'env_category.name as category','env_sub_category.name as subcategory' 
                            ])
                            ->join('env_category', 'env_file.id_category', '=', 'env_category.id')
                            ->join('env_sub_category', 'env_file.id_sub_category', '=', 'env_sub_category.id')
                            ->get();
        return view('backend.env.index', compact('env_kategori','list'));
    }

    public function getSubCategory($param){
        $sc = EnvSubCategory::where("id_category",$param)->pluck('id','name');
        return response()->json($sc);
    }

    public function store(Request $request){
        // dd($request);
        $date = Carbon::now()->toDateTimeString();
        $tglBln = Carbon::now()->format('ym');
        $t_req = EnvFileModel::count();
        
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'status_akses' => 'required',
            'kategori' => 'required',
            'sub_category' => 'required',
            'status_akses' => 'required',

        ]);

        if($request->kode_env == ''){
            if ($t_req == 0) {
                $urut = 10000001;
                $nomor = 'ENV-'. $tglBln . $urut;
            } else {
                $last_req = EnvFileModel::all()->last();
                $urut = (int) substr($last_req->kode_env, -8) + 1;
                $nomor = 'ENV-'.$tglBln . $urut;
            }
          
        }

        foreach($request->addMoreInputFields as $key => $value){
           
            $data = $request->file('addMoreInputFields.' . $key . '.name');
            $data->storeAs('public/env', $data->hashName());
            EnvFileUploadModel::create(
            [
                'kode_env' => $nomor,
                'file' => $data->hashName(),
                'name' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
            ]);
        }

        EnvFileModel::create(
            [
            'kode_env' => $nomor,
            'name' => $request->input('name'),
            'id_sub_category' => $request->input('sub_category'),
            'id_category' => $request->input('kategori'),
            'status_request' => $request->input('status'),
            'status_akses' => $request->input('status_akses'),
            'user_id' => Auth::user()->id,
            'due_date' => $request->input('due_date'),
            'schedule_reminder' => $request->input('reminder'),
        ]);

        return to_route('env')->with('message','Data berhasil disimpan.');
    }

    public function show($param){

        $list = EnvFileModel::select(['env_file.*',
                                'env_category.name as category','env_sub_category.name as subcategory' 
                            ])
                            ->join('env_category', 'env_file.id_category', '=', 'env_category.id')
                            ->join('env_sub_category', 'env_file.id_sub_category', '=', 'env_sub_category.id')
                            ->where('env_file.kode_env','=', $param)
                            ->first();
        
        $file = EnvFileUploadModel::select('*')->where('kode_env',$param)->get();
        return view('backend.env.show',compact('list','file','param'));
    }

    public function downloadMaster($file){
        $filePath = public_path("storage/file/".$file);
    	$fileName = time();

    	return response()->download($filePath, $file);
    }

    public function view($param){
        $show_env = DB::table('env_file')
                    ->select('env_file.id','env_file.kode_env','env_file.name','env_file.name','env_file.id_category','env_file.id_sub_category',
                            'env_file.created_at','env_category.name as category', 'env_sub_category.name as subcategory',
                            'env_file.status_request','env_file.status_akses','env_file.due_date')
                    ->join('env_category','env_category.id','env_file.id_category') 
                    ->join('env_sub_category','env_sub_category.id','env_file.id_sub_category')  
                    ->where('env_file.id','=', $param)
                    ->first();

        return Response()->json($show_env);
    }

    public function getDataAjax($param){
        $data = DB::table('env_upload_file')->select('id','kode_env','file','name')->where('kode_env', $param)->get();
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0);" onClick="deleteData('.$row->id.')" class="btn font-15 btn-outline-danger btn-sm"><i class="las la-trash"></i></a>';
                       
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function getFileAjax(){
        $data = EnvFileModel::select(['env_file.id','env_file.kode_env','env_file.name',
                                'env_category.name as category','env_sub_category.name as subcategory' 
                            ])
                            ->join('env_category', 'env_file.id_category', '=', 'env_category.id')
                            ->join('env_sub_category', 'env_file.id_sub_category', '=', 'env_sub_category.id')
                            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="las la-cog"></i>
                                </a>';
                    $btn = $btn. ' <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">';
                    $btn = $btn. '<a class="dropdown-item" data-toggle="modal" data-target="#env-edit" href="javascript:void(0);" onClick="editEnv( '.$row->id.')">Edit</a>';
                    $btn = $btn. '<a class="dropdown-item" href="javascript:void(0);" onClick="deleteFunc('.$row->id.')">Delete</a>';
                    $btn = $btn. '</div>';
                      
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function destroy($id){

        $kd = EnvFileModel::select('kode_env')->where('id', $id)->first();
        EnvFileModel::find($id)->delete($id);
        $data = EnvFileUploadModel::select('file')->where('kode_env', $kd);
       
        foreach($data as $kode){
            unlink(public_path().'/storage/env/'.$kode->file);
        }
        DB::table('env_upload_file')->where('kode_env', '=', $kd)->delete();

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);

    }

    public function deleteData($id){
        $data = EnvFileUploadModel::select('*')->where('id', $id)->first();
        EnvFileUploadModel::find($id)->delete($id);
        if(file_exists(public_path().'/storage/env/'.$data->file)){
            unlink(public_path().'/storage/env/'.$data->file);
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
            $data->storeAs('public/env', $data->hashName());
            EnvFileUploadModel::create(
            [
                'kode_env' => $request->input('addMoreInputFields.' . $key . '.kode_env'),
                'file' => $data->hashName(),
                'name' => $request->input('addMoreInputFields.' . $key . '.name')
            ]);
            return to_route('env')->with('message','Data Berhasil di update.');
        }
    }

    public function folder(){

        if(Auth::user()->id_department == 4 || Auth::user()->hasRole('admin')){
            $folder = DB::table('env_file')->select(array('id_category', DB::raw('COUNT(id_category) as total'), 'env_category.name as name') )
                ->join('env_category','env_file.id_category','env_category.id')
                ->join('env_upload_file','env_file.kode_env','env_upload_file.kode_env')
                ->groupBy('id_category')
                ->orderBy('id_category')
                ->get();
        }else{
            $folder = DB::table('env_file')->select(array('env_file.id_category', DB::raw('COUNT(env_file.id_category) as total'), 'env_category.name as name','status_akses'))
                ->where('env_file.status_akses',1)
                ->join('env_category','env_file.id_category','env_category.id')
                ->join('env_upload_file','env_file.kode_env','env_upload_file.kode_env')
                //->where('env_file.status_akses','=',1)
                ->groupBy('id_category')
                ->orderBy('id_category')
                ->get();
        }
        
        
        return view('backend.env.folder', compact('folder'));
    }

    public function folderCategory($param){
        $id_cat = EnvCategory::select('id')->where('name',$param)->first();
        
        if(Auth::user()->id_department == 4 || Auth::user()->hasRole('admin')){
            $folder = DB::table('env_file')->select(array('id_sub_category', DB::raw('COUNT(id_sub_category) as total'),'env_file.id', 'env_sub_category.name as name','env_file.id_category') )
                ->where('env_file.id_category','=',$id_cat->id)
                ->join('env_sub_category','env_file.id_sub_category','env_sub_category.id')
                ->join('env_upload_file','env_file.kode_env','env_upload_file.kode_env')
                ->groupBy('id_sub_category')
                ->orderBy('id_sub_category')
                ->get();
        }else{
            $folder = DB::table('env_file')->select(array('id_sub_category', DB::raw('COUNT(id_sub_category) as total'),'env_file.id', 'env_sub_category.name as name','env_file.id_category') )
                ->where('env_file.id_category','=',$id_cat->id)
                ->where('env_file.status_akses',1)
                ->join('env_sub_category','env_file.id_sub_category','env_sub_category.id')
                ->join('env_upload_file','env_file.kode_env','env_upload_file.kode_env')
                ->groupBy('id_sub_category')
                ->orderBy('id_sub_category')
                ->get();
        }
        
        
        return view('backend.env.category-folder', compact('folder'));
    }

    public function fileInFolder($param){

        $title = EnvSubCategory::select('*')->where('id', $param)->first();
        if(Auth::user()->id_department == 4 || Auth::user()->hasRole('admin')){
 
            $list = DB::table('env_upload_file')->select('env_file.kode_env','env_upload_file.file','env_upload_file.name','env_file.id_sub_category')
                    ->join('env_file','env_upload_file.kode_env', 'env_file.kode_env')
                    ->where('env_file.id_sub_category',$param)
                    ->get();
        }else{
            $list = DB::table('env_upload_file')->select('env_file.kode_env','env_upload_file.file','env_upload_file.name','env_file.id_sub_category')
                    ->join('env_file','env_upload_file.kode_env', 'env_file.kode_env')
                    ->where('env_file.id_sub_category',$param)
                    ->where('env_file.status_akses',1)
                    ->get();
        }
        
         return view('backend.env.file', compact('list','param','title'));
    }

    public function downloadEnv($file){
        $filePath = public_path("storage/env/".$file);
            //$fileName = time().'-BIIE.dwg';
        return response()->download($filePath, $file);
    }
}
