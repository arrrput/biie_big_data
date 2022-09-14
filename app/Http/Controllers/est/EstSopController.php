<?php

namespace App\Http\Controllers\est;

use Illuminate\Http\Request;
use App\Models\est\EstateSopModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EstSopController extends Controller
{
    //
    public function index(Request $request){

        return view('backend.est.sop');
    }

    // Store SOP ke database
    public function store(Request $request){
        if($request->file('file')){
            $request->validate([
                'no_revisi' => 'required',
                'name' => 'required',
                'jenis_sop' => 'required',
                'file' => 'required|mimes:pdf,doc,docx|max:5048',
    
            ]);
        }else{
            $request->validate([
                'no_revisi' => 'required',
                'name' => 'required',
                'jenis_sop' => 'required',
    
            ]);
        }
        
        if($request->file('file')){
            $file = $request->file('file');
            $file->storeAs('public/file', $file->hashName());
            $f = $file->hashName();
        }else{ $f = $request->input('f_edit');}   
        
        EstateSopModel::updateOrCreate(
            ['id' => $request->id],
            [
            'no_revisi' => $request->input('no_revisi'),
            'name' => $request->input('name'),
            'file' => $f,
            'jenis_sop' => $request->input('jenis_sop'),
            'user_id' => Auth::user()->id,
            'obsolete' => 0,
        ]);

        return to_route('estate.sop')->with('message','Data berhasil di update.');
    }

    public function getSop(){
        $sop = EstateSopModel::all();

            $datatables =  datatables()->of($sop);
            return $datatables->addColumn('action', 'backend/bangunan/action')
                 ->rawColumns(['action'])
                 ->addColumn('jns', function($row){
                     if($row->jenis_sop == 1){
                         return 'Standart Operational Procedure';
                     }else if($row->jenis_sop == 2){
                        return 'Working Instruction';
                     }else if($row->jenis_sop == 3){
                         return 'FORM';
                     }
                 })
                 ->addIndexColumn()
                 ->make(true);
    }

    public function destroy($id){
        $file_delete = EstateSopModel::select('file')->where('id','=',$id)->first();
        EstateSopModel::find($id)->delete($id);
            if(Storage::exists('public/file/'.$file_delete)){
                Storage::delete('public/file/'.$file_delete);
            }

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function edit($param){
        $show_est =EstateSopModel::where('id',$param)->first();

        return Response()->json($show_est);
    }

    public function detail($param){
        
        return view('backend.est.sop_detail', compact('param'));
    }

    public function ajaxSop(){
        $sop = EstateSopModel::select('*')->where('jenis_sop',1)->get();

            $datatables =  datatables()->of($sop);
            return $datatables->addColumn('action', '<a href="#" class="btn btn-danger btn-sm">Download</a>')
                 ->rawColumns(['action'])
                 ->addColumn('jns', function($row){
                     if($row->jenis_sop == 1){
                         return 'Standart Operational Procedure';
                     }else if($row->jenis_sop == 2){
                        return 'Working Instruction';
                     }else if($row->jenis_sop == 3){
                         return 'FORM';
                     }
                 })
                 ->addIndexColumn()
                 ->make(true);
    }

    public function ajaxWi(){
        $wi = EstateSopModel::select('*')->where('jenis_sop',2)->get();

            $datatables =  datatables()->of($wi);
            return $datatables->addColumn('action', '<a href="#" class="btn btn-danger btn-sm">Download</a>')
                 ->rawColumns(['action'])
                 ->addColumn('jns', function($row){
                     if($row->jenis_sop == 1){
                         return 'Standart Operational Procedure';
                     }else if($row->jenis_sop == 2){
                        return 'Working Instruction';
                     }else if($row->jenis_sop == 3){
                         return 'FORM';
                     }
                 })
                 ->addIndexColumn()
                 ->make(true);
    }

    public function ajaxForm(){
        $form = EstateSopModel::select('*')->where('jenis_sop',3)->get();

            $datatables =  datatables()->of($form);
            return $datatables->addColumn('action', '<a href="#" class="btn btn-danger btn-sm">Download</a>')
                 ->rawColumns(['action'])
                 ->addColumn('jns', function($row){
                     if($row->jenis_sop == 1){
                         return 'Standart Operational Procedure';
                     }else if($row->jenis_sop == 2){
                        return 'Working Instruction';
                     }else if($row->jenis_sop == 3){
                         return 'FORM';
                     }
                 })
                 ->addIndexColumn()
                 ->make(true);
    }
}
