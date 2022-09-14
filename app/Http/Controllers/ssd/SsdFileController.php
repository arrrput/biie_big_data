<?php

namespace App\Http\Controllers\ssd;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ssd\SsdFileModel;
use App\Http\Controllers\Controller;
use App\Models\ssd\SsdCategoryModel;
use App\Models\ssd\SsdFileUploadModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ssd\SsdSubCategoryModel;

class SsdFileController extends Controller
{
    //
    public function index(){
        $ssd_kategori = SsdCategoryModel::all();
        $list = SsdFileModel::select(['ssd_file.*',
                                'ssd_category.name as category','ssd_sub_category.name as subcategory' 
                            ])
                            ->join('ssd_category', 'ssd_file.id_category', '=', 'ssd_category.id')
                            ->join('ssd_sub_category', 'ssd_file.id_sub_category', '=', 'ssd_sub_category.id')
                            ->get();

        return view('backend.ssd.index',compact('ssd_kategori','list'));
    }

    public function store(Request $request){
        // dd($request);
        $tglBln = Carbon::now()->format('ym');
        $t_req = SsdFileModel::count();
        
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'status_akses' => 'required',
            'kategori' => 'required',
            'sub_category' => 'required',
            'status_akses' => 'required',

        ]);

        if($request->kode_ssd == ''){
            if ($t_req == 0) {
                $urut = 10000001;
                $nomor = 'SSD-'. $tglBln . $urut;
            } else {
                $last_req = SsdFileModel::all()->last();
                $urut = (int) substr($last_req->kode_ssd, -8) + 1;
                $nomor = 'SSD-'.$tglBln . $urut;
            }
          
        }

        foreach($request->addMoreInputFields as $key => $value){
           
            $data = $request->file('addMoreInputFields.' . $key . '.name');
            $data->storeAs('public/file', $data->hashName());
            SsdFileUploadModel::create(
            [
                'kode_ssd' => $nomor,
                'file' => $data->hashName(),
                'name' => $request->input('addMoreInputFields.' . $key . '.keterangan'),
            ]);
        }

        SsdFileModel::create(
            [
            'kode_ssd' => $nomor,
            'name' => $request->input('name'),
            'id_sub_category' => $request->input('sub_category'),
            'id_category' => $request->input('kategori'),
            'status_request' => $request->input('status'),
            'status_akses' => $request->input('status_akses'),
            'user_id' => Auth::user()->id,
            'due_date' => $request->input('due_date'),
            'schedule_reminder' => $request->input('reminder'),
        ]);

        return to_route('ssd')->with('message','Data berhasil disimpan.');
    }

    public function getSubCategory($param){

        $sc = SsdSubCategoryModel::where("id_category",$param)->pluck('id','name');
        return response()->json($sc);
    }

    public function show($param){

        $list = SsdFileModel::select(['ssd_file.*',
                                'ssd_category.name as category','ssd_sub_category.name as subcategory' 
                            ])
                            ->join('ssd_category', 'ssd_file.id_category', '=', 'ssd_category.id')
                            ->join('ssd_sub_category', 'ssd_file.id_sub_category', '=', 'ssd_sub_category.id')
                            ->where('ssd_file.kode_ssd','=', $param)
                            ->first();
        
        $file = SsdFileUploadModel::select('*')->where('kode_ssd',$param)->get();
        return view('backend.ssd.show',compact('list','file','param'));
    }

    public function downloadMaster($file){
        $filePath = public_path("storage/file/".$file);
    	$fileName = time();

    	return response()->download($filePath, $file);
    }
}
