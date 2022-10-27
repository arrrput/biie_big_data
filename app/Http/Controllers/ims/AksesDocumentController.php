<?php

namespace App\Http\Controllers\ims;

use Illuminate\Http\Request;
use App\Models\ims\DownloadMaster;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ims\MasterDocumentModel;
use Carbon\Carbon;

class AksesDocumentController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){

        }

        $sop = MasterDocumentModel::select('ims_master_document.*', 'department.name as department')
                ->join('department','ims_master_document.id_dept','department.id')
                ->where('hirarki_doc',1)
                ->get();
        $wi = MasterDocumentModel::select('ims_master_document.*', 'department.name as department')
                ->join('department','ims_master_document.id_dept','department.id')
                ->where('hirarki_doc',2)
                ->get();
        $form = MasterDocumentModel::select('ims_master_document.*', 'department.name as department')
                ->join('department','ims_master_document.id_dept','department.id')
                ->where('hirarki_doc',3)
                ->get();
        $edited = MasterDocumentModel::select('ims_master_document.*', 'department.name as department')
                ->join('department','ims_master_document.id_dept','department.id')
                ->where('hirarki_doc',4)
                ->get();

        return view('backend.ims.document_file',compact('sop','wi','form','edited'));
    }

    public function viewPdf($file){


        return view('backend.ims.viewpdf', compact('file'));
    }

    public function requestDownload(Request $request){
        // dd($request->all());
        DownloadMaster::create([
            'user_id'=> Auth::user()->id,
            'id_doc' => $request->input('id_doc'),
            'status' => 0
        ]);

        return redirect()->back()->with('status','Request Berhasil dikirimkan');
    }

    public function request(){

        $list = DownloadMaster::select('ims_download_master.*', 'users.name as username','ims_master_document.no_document', 'ims_master_document.title')
            ->join('ims_master_document','ims_download_master.id_doc','ims_master_document.id' )
            ->join('users','ims_download_master.user_id', 'users.id')
            ->where('ims_download_master.status',0)
            ->get();
        return view('backend.ims.request' , compact('list'));
    }

    public function approve($id){
        $update = DownloadMaster::find($id);
        $now = Carbon::now();
        $update->update([
            'status' => 1,
            'date_approve' => $now
        ]);
        return redirect()->back()->with('status','Request was approve');
    }

    public function reject($id){
        $update = DownloadMaster::find($id);
        $now = Carbon::now();
        $update->update([
            'status' => 2,
            'date_approve' => $now
        ]);
        return redirect()->back()->with('status','Request was approve');
        return redirect()->back()->with('status','Request was reject');
    }
}
