<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataModel;
use App\Models\EstCategory;
use Illuminate\Http\Request;
use App\Models\BangunanModel;
use App\Models\EstateDownload;
use App\Models\EstSubCategory;
use App\Models\KategoriBangunan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BangunanController extends Controller
{
    
    //permission
    function __construct()
    {
         $this->middleware('permission:estate-list|estate-create|estate-edit|estate-delete', ['only' => ['index','show']]);
         $this->middleware('permission:estate-create', ['only' => ['create','store']]);
         $this->middleware('permission:estate-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:estate-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){

        if($request->ajax()){
             DB::statement(DB::raw('set @rownum=0'));

            $list_bangunan = BangunanModel::select(['table_bangunan.*',
                                'table_est_category.name as category','table_est_sub_category.name as subcategory' 
                            ])
                            ->join('table_est_category', 'table_bangunan.id_est_category', '=', 'table_est_category.id')
                            ->join('table_est_sub_category', 'table_bangunan.id_est_sub_category', '=', 'table_est_sub_category.id')
                            ->get();

            
            $datatables =  datatables()->of($list_bangunan);
            if($cat = $request->get('id_est_category')){
                     $list_bangunan->where('id_est_category', '=', $cat);
            }

            if ($keyword = $request->get('search')['value']) {
                // $datatables->filterColumn('title', 'where', 'like', "$keyword%");
    
                // override users.id global search - demo for concat
                $datatables->filter('table_bangunan.name', 'where', 'like', "$keyword%");
            }

            return $datatables->addColumn('action', 'backend/bangunan/action')
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);

        }

        $kategori = KategoriBangunan::all();
        $list_estate = BangunanModel::orderBy('id','DESC')->get();
        $est_kategori = EstCategory::all();
        // foreach($list_estate as $list){
        //     $data[] = $list['id'];
        // }
        // dd($data);
        
        return view('backend.bangunan.index', compact('kategori','list_estate','est_kategori'));
    }

    public function filter(Request $request){

            $list_bangunan = BangunanModel::select(['table_bangunan.*',
                            DB::raw("CONCAT(table_bangunan.title,' - ',table_bangunan.name) as fullname"),
                                'table_est_category.name as category','table_est_sub_category.name as subcategory' 
                            ])
                            ->join('table_est_category', 'table_bangunan.id_est_category', '=', 'table_est_category.id')
                            ->join('table_est_sub_category', 'table_bangunan.id_est_sub_category', '=', 'table_est_sub_category.id')
                            ;

                        
            if($request->get('id_est_category')){
                $cat = $request->get('id_est_category');
                if(strlen($request->get('id_est_category')) < 2 ){
                  $list_bangunan =  $list_bangunan->where('table_bangunan.id_est_category', '=', $cat);
                }
            }

            if($request->get('id_est_sub_category')){
                $csub = $request->get('id_est_sub_category');
                if(strlen($request->get('id_est_sub_category')) < 2 ){
                  $list_bangunan =  $list_bangunan->where('table_bangunan.id_est_sub_category', '=', $csub);
                }
            }

            if ($request->get('search')['value']) {
                
            }
            $datatables =  datatables()->of($list_bangunan->get());
            return $datatables->addColumn('action', 'backend/bangunan/action')
                 ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);

    }

    
    public function getSubCategory($param){
        $sc = EstSubcategory::where("id_est_category",$param)->pluck('id','name');
        return response()->json($sc);
    }

    public function store(Request $request){
        //  dd($request);
        $date = Carbon::now()->toDateTimeString();
        $tglBln = Carbon::now()->format('ym');
        $t_req = BangunanModel::count();
        if($request->kode_bangunan == ''){
            if ($t_req == 0) {
                $urut = 10000001;
                $nomor = 'EST-'. $tglBln . $urut;
            } else {
                $last_req = BangunanModel::all()->last();
                $urut = (int) substr($last_req->kode_bangunan, -8) + 1;
                $nomor = 'EST-'.$tglBln . $urut;
            }
            $request->validate([
                        'title' => 'required',
                        'name' => 'required',
                        'status' => 'required',
                        'kategori' => 'required',
                        'sub_category' => 'required',
                        'status_akses' => 'required',
            
                    ]);
        }else{$nomor = $request->kode_bangunan;
            $request->validate([
                'title' => 'required',
                'name' => 'required',
                'status' => 'required',
                'kategori' => 'required',
                'sub_category' => 'required',
                'status_akses' => 'required',
    
            ]);
        }
        
        

        foreach($request->addMoreInputFields as $key => $value){
           
            $data = $request->file('addMoreInputFields.' . $key . '.name');
            $data->storeAs('public/file', $data->hashName());
            DataModel::updateOrCreate(['id'=>$request->input('addMoreInputFields.' . $key . '.id') ],
            [
                'kode_bangunan' => $nomor,
                'name' => $data->hashName(),
                'id_category' => $request->input('addMoreInputFields.' . $key . '.id_category'),
                'keterangan' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
            ]);
        }


        // if($request->file('cover')){
        //     $image = $request->file('cover');
        //     $image->storeAs('public/file', $image->hashName());
        //     $img = $image->hashName();
        // }else{
        //     $d = BangunanModel::select('cover')->where('id','=', $request->id)->first();
        //     $img = $d->cover;
        // }
        
        
        BangunanModel::updateOrCreate(
            ['id' => $request->id],
            [
            'kode_bangunan' => $nomor,
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'id_est_sub_category' => $request->input('sub_category'),
            'id_est_category' => $request->input('kategori'),
            // 'deskripsi' => $request->input('deskripsi'),
            // 'cover' => $img,
            'status' => $request->input('status'),
            'status_akses' => $request->input('status_akses'),
            'user_id' => Auth::user()->id,
            'due_date' => $request->input('due_date'),
        ]);

        return to_route('estate.index')->with('message','Data berhasil dimasukan');

    }

    public function update(Request $request){

        $tglBln = Carbon::now()->format('ym');
        $t_req = BangunanModel::count();

        if ($t_req == 0) {
            $urut = 10000001;
            $nomor = 'EST-'. $tglBln . $urut;
        } else {
            $last_req = BangunanModel::all()->last();
            $urut = (int) substr($last_req->kode_bangunan, -8) + 1;
            $nomor = 'EST-'.$tglBln . $urut;
        }

        // $est_id = $request->id;
        // if($request->has('id')){
        //     $request->validate([
        //         'title' => 'required',
        //         'name' => 'required',
        //         'deskripsi' => 'required',
        //         'status' => 'required',
        //         'kategori' => 'required',
        //         'sub_category' => 'required',
        //         'status_akses' => 'required',
    
        //     ]);
        // }else{
        //     $request->validate([
        //         'title' => 'required',
        //         'name' => 'required',
        //         'deskripsi' => 'required',
        //         'cover' => 'required|mimes:pdf|max:1048',
        //         'status' => 'required',
        //         'kategori' => 'required',
        //         'sub_category' => 'required',
        //         'status_akses' => 'required',
        //     ]);
        // }
        
        

        // foreach($request->addMoreInputFields as $key => $value){
        //     if($request->input('addMoreInputFields.' . $key . '.type') == '1'){
        //         $data = $request->file('addMoreInputFields.' . $key . '.name');
        //         $data->storeAs('public/image', $data->hashName());    
        //     }else if($request->input('addMoreInputFields.' . $key . '.type') == '2'){
        //         $data = $request->file('addMoreInputFields.' . $key . '.name');
        //         $data->storeAs('public/file', $data->hashName());
        //     }
        //     DataModel::create([
        //         'kode_bangunan' => $nomor,
        //         'name' => $data->hashName(),
        //         'type' => $request->input('addMoreInputFields.' . $key . '.type'),
        //         'keterangan' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
        //     ]);
        // }        

        $field_input = [
            'id' => $request->id,
            'kode_bangunan' => $request->input('kode_bangunan'),
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'id_est_sub_category' => $request->input('sub_category'),
            'id_est_category' => $request->input('kategori'),
            'deskripsi' => $request->input('deskripsi'),
            'status' => $request->input('status'),
            'status_akses' => $request->input('status_akses'),
            'user_id' => Auth::user()->id,
            'due_date' => $request->input('due_date'),
        ];
        
        if($request->file('cover')){
            
            // if(Storage::exists('public/file/'.$re)){
            //     Storage::delete('public/file/'.$file_delete);
            // }
            $image = $request->file('cover');
            $image->storeAs('public/file', $image->hashName());
            $field_input = ['cover' => $image->hashName()];
        }

        BangunanModel::updateOrCreate($field_input);

        return to_route('estate.index')->with('message','Data berhasil dimasukan');

    }

    public function destroy($id){
        

        BangunanModel::find($id)->delete($id);
            BangunanModel::where('kode_bangunan','=',$id)->delete();
            $list = DataModel::select('*')->where('kode_bangunan', $id)->get();
            
            foreach($list as $l){
                DataModel::find($l->id)->delete($l->id);
                if(Storage::exists('public/file/'.$l->name)){
                    Storage::delete('public/file/'.$l->name);
                }
            }

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
            // return redirect()->route('estate.index')
            //                 ->with('message','deleted successfully');
            
        
    }

    public function ajaxdestroy($id){
        if(request()->ajax()){
        
            $file_delete = BangunanModel::select('cover')->where('id','=',$id)->first();
            $del_est = BangunanModel::where('kode_bangunan','=',$id)->delete();
            DataModel::where('kode_bangunan','=',$id)->delete();

             if(Storage::exists('file/'.$file_delete)){
                // unlink(public_path().'/storage/env/'.);
                Storage::delete('file/'.$file_delete);
            }

            return Response()->json($del_est);
            // return redirect()->route('estate.index')
            //                 ->with('message','deleted successfully');
        }
    }

    public function show($param){
        
        $data = BangunanModel::where('kode_bangunan', '=', $param)->first();
        $total = EstateDownload::where('kode_bangunan','=', $param)
                ->where('user_id','=', Auth::user()->id)
                ->where('status','=','1')
                ->count();
        $pending = EstateDownload::where('kode_bangunan','=', $param)
                ->where('user_id','=', Auth::user()->id)
                ->where('status','=','0')
                ->count();

        $download = EstateDownload::select('*')
                    ->where('kode_bangunan','=', $param)
                    ->where('user_id','=', Auth::user()->id)
                    ->where('status','=','1')
                    ->first();
        $list_document = DB::table('table_data')->select('table_data.*','table_estate_download.user_id','table_estate_download.id_data','table_estate_download.status as status_download')->where('table_data.kode_bangunan',$param)
                        ->leftJoin('table_estate_download','table_data.id','table_estate_download.id_data')
                        ->get();
        $reject = EstateDownload::select('*')
            ->where('kode_bangunan','=', $param)
            ->where('user_id','=', Auth::user()->id)
            ->where('status','=','2')
            ->count();
        //$jml_download = $download->user_id->count();

        return view('backend.bangunan.show', compact('list_document','param','data','download','total','pending','reject'));
    }

    public function downloadMaster($file){
        $filePath = public_path("storage/file/".$file);
    	//$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $file);
    }

    public function downloadPhoto($file){
        $filePath = public_path("storage/image/".$file);
    	$fileName = time().'-BIIE.jpg';

    	return response()->download($filePath, $fileName);
    }

    public function requestDownload(Request $request){
        // dd($request->all());
        EstateDownload::create([
            'user_id'=> Auth::user()->id,
            'kode_bangunan' => $request->input('kode_bangunan'),
            'id_data' => $request->input('data_id'),
            'status' => 0
        ]);

        return to_route('estate.kategori', $request->kode_bangunan)->with('status','Request Berhasil dikirimkan');
    }

    public function view($param){
        $show_est = DB::table('table_bangunan')
                    ->select('table_bangunan.id','table_bangunan.kode_bangunan','table_bangunan.title','table_bangunan.name','table_bangunan.id_est_category','table_bangunan.id_est_sub_category',
                            'table_bangunan.created_at','table_est_category.name as category', 'table_est_sub_category.name as subcategory',
                            'table_bangunan.status','table_bangunan.deskripsi','table_bangunan.due_date','table_bangunan.status_akses')
                    ->join('table_est_category','table_est_category.id','table_bangunan.id_est_category') 
                    ->join('table_est_sub_category','table_est_sub_category.id','table_bangunan.id_est_sub_category')  
                    ->where('table_bangunan.id','=', $param)
                    ->first();

        return Response()->json($show_est);
    }

    public function fileEst(){
        $arsitektur = BangunanModel::select('kode_bangunan')->where('status','=',1)
        ->where('status_akses','=', 1)
        ->where('id_est_category', '=', 1 )
        ->count();

        return view('backend.est.index', compact('arsitektur'));
    }

}
