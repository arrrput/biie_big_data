<?php

namespace App\Http\Controllers;

use App\Models\EstateDownload;
use Illuminate\Support\Facades\DB;

class EstateRequestController extends Controller
{
    //

    function __construct()
    {
         $this->middleware('permission:estate-request-download', ['only' => ['index','show']]);
    }


    public function index(){


        $data =  EstateDownload::where('status','=',0)->get();
        $req = DB::table('table_estate_download')
                ->select('users.name','table_estate_download.kode_bangunan','table_bangunan.title')
                ->join('users','table_estate_download.user_id','users.id')
                ->join('table_bangunan','table_estate_download.kode_bangunan','table_bangunan.kode_bangunan')
                ->where('table_estate_download.status','=',0)
                ->get();
        return view('backend.download.index', compact('data','req'));
    }

    public function approve($param)
    {
        
    }
}
