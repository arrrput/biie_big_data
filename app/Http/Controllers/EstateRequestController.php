<?php

namespace App\Http\Controllers;

use App\Models\EstateDownload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstateRequestController extends Controller
{
    //

    function __construct()
    {
         $this->middleware('permission:estate-request-download', ['only' => ['index','show']]);
         $this->middleware('permission:list-download', ['only' => ['mylistDownload']]);
         
    }


    public function index(){

        $data =  EstateDownload::where('status','=',0)->get();
        $req = DB::table('table_estate_download')
                ->select('users.name','table_estate_download.kode_bangunan','table_bangunan.title','table_estate_download.id')
                ->join('users','table_estate_download.user_id','users.id')
                ->join('table_bangunan','table_estate_download.kode_bangunan','table_bangunan.kode_bangunan')
                ->where('table_estate_download.status','=',0)
                ->get();
        return view('backend.download.index', compact('data','req'));
    }

    public function approve($param)
    {
        EstateDownload::where('id', $param)
            ->update(['status' => 1]);
        return to_route('request.download')->with('message','Request telah di approve');
    }

    public function cancel($param){
        EstateDownload::where('id', $param)
            ->update(['status' => 2]);

        return to_route('request.download')->with('message','Request telah dicancel');
    }

    public function mylistDownload(){ 
        $download_list = EstateDownload::where('user_id','=', Auth::User()->id)
                ->whereNot('status',0)->get();

        $list = DB::table('table_estate_download')
            ->whereNot('table_estate_download.status','=',0)
            ->where('table_estate_download.user_id','=', Auth::user()->id)
            ->join('table_data','table_estate_download.id_data','table_data.id')
            ->join('table_bangunan','table_bangunan.kode_bangunan', '=','table_estate_download.kode_bangunan')
            ->select('table_estate_download.id','table_estate_download.kode_bangunan','table_estate_download.status',
                'table_bangunan.name','table_data.keterangan','table_data.name as file')
            ->get();

        return view('backend.bangunan.listdownload',compact('download_list','list'));
    }
}
