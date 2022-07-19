<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataModel;
use Image;
use Illuminate\Http\Request;
use App\Models\BangunanModel;
use App\Models\EstateDownload;
use App\Models\KategoriBangunan;
use Illuminate\Support\Facades\Auth;

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

    public function index(){

        $kategori = KategoriBangunan::all();
        $list_estate = BangunanModel::paginate(10);
        return view('backend.bangunan.index', compact('kategori','list_estate'));
    }

    public function store(Request $request){
        //dd($request->file('addMoreInputFields.' . 0 . '.name')->hashName());
        $date = Carbon::now()->toDateTimeString();
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

        $request->validate([
            'addMoreInputFields.*.name' => 'required|mimes:dwg,jpeg,png,jpg,gif,svg|max:5048',
            'addMoreInputFields.*.type' => 'required',
            'addMoreInputFields.*.keterangan' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            'type' => 'requeired',
            'status' => 'required',
            'kategori' => 'required',
        ]);

        foreach($request->addMoreInputFields as $key => $value){
            if($request->input('addMoreInputFields.' . $key . '.type') == '1'){
                $data = $request->file('addMoreInputFields.' . $key . '.name');
                $data->storeAs('public/image', $data->hashName());    
            }else if($request->input('addMoreInputFields.' . $key . '.type') == '2'){
                $data = $request->file('addMoreInputFields.' . $key . '.name');
                $data->storeAs('public/file', $data->hashName());
            }
            DataModel::create([
                'kode_bangunan' => $nomor,
                'name' => $data->hashName(),
                'type' => $request->input('addMoreInputFields.' . $key . '.type'),
                'katerangan' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
            ]);
        }

        $image = $request->file('cover');
        $image->storeAs('public/image', $image->hashName());

        BangunanModel::create([
            'kode_bangunan' => $nomor,
            'title' => $request->input('title'),
            'deskripsi' => $request->input('deskripsi'),
            'cover' => $image->hashName(),
            'status' => $request->input('status'),
            'user_id' => Auth::user()->id,
            'kategori_bangunan_id' => $request->input('kategori'),
        ]);

        return to_route('estate.index')->with('message','Data berhasil dimasukan');

    }

    public function destroy($id){
        BangunanModel::where('kode_bangunan','=',$id)->delete();
        DataModel::where('kode_bangunan','=',$id)->delete();
        return redirect()->route('estate.index')
                        ->with('message','deleted successfully');
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
        //$jml_download = $download->user_id->count();

        return view('backend.bangunan.show', compact('param','data','download','total','pending'));
    }

    public function downloadMaster($file){
        $filePath = public_path("storage/file/".$file);
    	$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $fileName);
    }

    public function downloadPhoto($file){
        $filePath = public_path("storage/image/".$file);
    	$fileName = time().'-BIIE.jpg';

    	return response()->download($filePath, $fileName);
    }

    public function requestDownload(Request $request){


        EstateDownload::create([
            'user_id'=> Auth::user()->id,
            'kode_bangunan' => $request->input('kode_bangunan'),
            'status' => 0
        ]);

        return to_route('estate.show', $request->kode_bangunan)->with('status','Request Berhasil dikirimkan');
    }
}
