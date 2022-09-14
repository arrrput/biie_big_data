<?php

namespace App\Http\Controllers\est;

use File;
use App\Models\DataModel;
use Illuminate\Http\Request;
use App\Models\BangunanModel;
use App\Models\EstateDownload;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\EstCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileEstController extends Controller
{
    //

    public function index(){

        $folder = DB::table('table_bangunan')->select(array('title', DB::raw('COUNT(name) as total')) )
                ->groupBy('title')
                ->orderBy('title')
                ->get();
        // dd($folder);

        return view('backend.est.index', compact('folder'));
    }

    public function struktur($param){
        $title = "Struktural";
        $est_kategori = EstCategory::all();
        if(Auth::user()->id_department == 3){
            $list_document =DataModel::select('table_data.*','table_bangunan.status as status')
                        ->where('table_data.kode_bangunan',$param)
                        ->where('table_data.id_category', 2)
                        ->join('table_bangunan','table_data.kode_bangunan','table_bangunan.kode_bangunan' )
                        ->get();
        }else{
            $list_document = DataModel::select('table_data.*', 'table_bangunan.status as status')
                        ->where('table_data.kode_bangunan',$param)
                        ->where('table_data.id_category', 2)
                        ->where('table_bangunan.status_akses',1)
                        ->join('table_bangunan','table_data.kode_bangunan','table_bangunan.kode_bangunan' )
                        ->get();
        }
        $list_download = EstateDownload::select('*')
            ->where('kode_bangunan',$param )->get();
        $total_d = $list_download->count();
        return view('backend.est.ars', compact('list_document','param','title','est_kategori','list_download','total_d'));
    }

    public function arsitektur($param){

        $title = "List Arsitektural";
        $est_kategori = EstCategory::all();
        if(Auth::user()->id_department == 3){
            $list_document =DataModel::select('table_data.*','table_bangunan.status as status')
                        ->where('table_data.kode_bangunan',$param)
                        ->where('table_data.id_category', 1)
                        ->join('table_bangunan','table_data.kode_bangunan','table_bangunan.kode_bangunan' )
                        ->get();
        }else{
            $list_document = DataModel::select('table_data.*', 'table_bangunan.status as status')
                        ->where('table_data.kode_bangunan',$param)
                        ->where('table_data.id_category', 1)
                        ->where('table_bangunan.status_akses',1)
                        ->join('table_bangunan','table_data.kode_bangunan','table_bangunan.kode_bangunan' )
                        ->get();
        }
        
        $list_download = EstateDownload::select('*')->where('kode_bangunan',$param)->get();
        $total_d = $list_download->count();
        //dd($list_document);
        return view('backend.est.ars', compact('list_document','param','title','est_kategori','list_download','total_d'));
    }

    public function mapping($param){

        $title = "List MEP"; 
        $est_kategori = EstCategory::all();
        if(Auth::user()->id_department == 3){
            $list_document =DataModel::select('table_data.*','table_bangunan.status as status')
                        ->where('table_data.kode_bangunan',$param)
                        ->where('table_data.id_category', 3)
                        ->join('table_bangunan','table_data.kode_bangunan','table_bangunan.kode_bangunan' )
                        ->get();
            
        }else{
            $list_document = DataModel::select('table_data.*', 'table_bangunan.status as status')
                        ->where('table_data.kode_bangunan',$param)
                        ->where('table_data.id_category', 3)
                        ->where('table_bangunan.status_akses',1)
                        ->join('table_bangunan','table_data.kode_bangunan','table_bangunan.kode_bangunan' )
                        ->get();
        }
        $list_download = EstateDownload::select('*')->where('kode_bangunan',$param )->get();
        $total_d = $list_download->count();
        //dd($list_document);
        return view('backend.est.ars', compact('list_document','param','title','est_kategori','list_download','total_d'));
    }

    public function getTitle($param){

        $list_title = DB::table('table_bangunan')->select('*')
        ->where('title', '=', $param)
        ->get();
        return view('backend.est.title', compact('list_title'));
    }

    public function getFolderCat($param){

        $arsitektur = DataModel::where('id_category','=',1)
                        ->where('kode_bangunan','=', $param)
                        ->count();

        $struktur = DataModel::where('id_category','=',2)
                        ->where('kode_bangunan','=', $param)
                        ->count();

        $mep = DataModel::where('id_category','=',3)
                        ->where('kode_bangunan','=', $param)
                        ->count();
        
        return view('backend.est.kategory', compact('arsitektur', 'struktur', 'mep','param'));  
    }

    public function listFile($param){

        if($param == 'arsitektural'){
            $list = BangunanModel::select('kode_bangunan')->where('status','=',1)
            ->where('status_akses','=', 1)
            ->where('id_est_category', '=', 1 )
            ->count();
        }

        if($param == 'struktural'){
            $list = BangunanModel::select('kode_bangunan')->where('status','=',1)
            ->where('status_akses','=', 1)
            ->where('id_est_category', '=', 1 )
            ->count();
        }

        if($param == 'mep'){
            $list = BangunanModel::select('kode_bangunan')->where('status','=',1)
            ->where('status_akses','=', 1)
            ->where('id_est_category', '=', 1 )
            ->count();
        }

        

        return view('backend.est.list_folder_est');
        
    }

    // Arsitektural
    public function arsitektural(){

        return view('backend.est.arsitektural');
    }

    public function ajax(){
        $list_bangunan = BangunanModel::select(['table_bangunan.*',
                            DB::raw("CONCAT(table_bangunan.title,' - ',table_bangunan.name) as fullname"),
                                'table_est_category.name as category','table_est_sub_category.name as subcategory' 
                            ])
                            ->join('table_est_category', 'table_bangunan.id_est_category', '=', 'table_est_category.id')
                            ->join('table_est_sub_category', 'table_bangunan.id_est_sub_category', '=', 'table_est_sub_category.id')
                            ->where('table_bangunan.id_est_category', '=', 1)
                            ->where('table_bangunan.status_akses','=', 1)
                            ->get();

            $datatables =  datatables()->of($list_bangunan);
            return $datatables->addColumn('action', 'backend/est/action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    // Strutural
    public function struktural(){

        return view('backend.est.struktural');
    }

    public function ajaxStrl(){
        $list_bangunan = BangunanModel::select(['table_bangunan.*',
                            DB::raw("CONCAT(table_bangunan.title,' - ',table_bangunan.name) as fullname"),
                                'table_est_category.name as category','table_est_sub_category.name as subcategory' 
                            ])
                            ->join('table_est_category', 'table_bangunan.id_est_category', '=', 'table_est_category.id')
                            ->join('table_est_sub_category', 'table_bangunan.id_est_sub_category', '=', 'table_est_sub_category.id')
                            ->where('table_bangunan.id_est_category', '=', 2)
                            ->get();

            $datatables =  datatables()->of($list_bangunan);
            return $datatables->addColumn('action', 'backend/bangunan/est/action')
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
    }

    // MEP
    public function mep(){

        return view('backend.est.mep');
    }

    public function ajaxMep(){
        $list_bangunan = BangunanModel::select(['table_bangunan.*',
                            DB::raw("CONCAT(table_bangunan.title,' - ',table_bangunan.name) as fullname"),
                                'table_est_category.name as category','table_est_sub_category.name as subcategory' 
                            ])
                            ->join('table_est_category', 'table_bangunan.id_est_category', '=', 'table_est_category.id')
                            ->join('table_est_sub_category', 'table_bangunan.id_est_sub_category', '=', 'table_est_sub_category.id')
                            ->where('table_bangunan.id_est_category', '=', 3)
                            ->get();

            $datatables =  datatables()->of($list_bangunan);
            return $datatables->addColumn('action', function($row){
                        if($row->status == 1){
                            
                            $btn = '<form method="POST" action="'. route('request.download').'">';
                            // $btn = $btn.'@csrf';
                            $btn = $btn.'<input type="hidden" value="'. $row->kode_bangunan.'" name="kode_bangunan"/>';
                            $btn = $btn.'<input type="submit" class="btn btn-primary " value="Request Download">
                                            </form>';
                        }else{
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->kode_bangunan.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Download</a>';
                        }
                    return $btn;
                    })
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
    }

    public function getDataAjax($param){
        $data = DB::table('table_data')->select('table_data.id','table_data.name','table_data.keterangan','table_est_category.name as category')
                ->join('table_est_category','table_est_category.id','table_data.id_category')
                ->where('kode_bangunan', $param)->get();
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0);" onClick="deleteData('.$row->id.')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>';
                       
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function addData(Request $request){

        // dd($request->all());

        foreach($request->addMoreInputFields as $key => $value){
           
            $data = $request->file('addMoreInputFields.' . $key . '.name');
            $data->storeAs('public/file', $data->hashName());
            DataModel::updateOrCreate(['id'=>$request->input('addMoreInputFields.' . $key . '.id') ],
            [
                'kode_bangunan' => $request->input('addMoreInputFields.' . $key . '.kd_bangunan'),
                'name' => $data->hashName(),
                'id_category' => $request->input('addMoreInputFields.' . $key . '.id_category'),
                'keterangan' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
            ]);
        }
        return to_route('estate.index')->with('message', 'Data berhasil di update ');
    }

    public function destroy($id){

        $file_delete = DataModel::select('name')->where('id','=',$id)->first();
        DataModel::find($id)->delete($id);
        
        Storage::delete('public/file/'.$file_delete);
        unlink('public/file'.$file_delete);
            if(Storage::exists('public/file'.$file_delete)){
                Storage::delete('public/file/'.$file_delete);
            }

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);

    }

    public function viewPDF($filename){
        
        $path = storage_path('app/public/file/'.$filename);

        //  return view('backend.est.pdf', compact('filename'));
        // return '<iframe frameborder="0" scrolling="no" style="border:0px" src="'.asset('storage/file/'.$filename).'" width="500" height=500>
        //    </iframe>';
        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    public function requestDownloadArs(Request $request){
        // dd($request->all());
        EstateDownload::create([
            'user_id'=> Auth::user()->id,
            'kode_bangunan' => $request->input('kode_bangunan'),
            'id_data' => $request->input('data_id'),
            'status' => 0
        ]);

        return to_route('estate.ars', $request->kode_bangunan)->with('status','Request Berhasil dikirimkan');
    }


}
