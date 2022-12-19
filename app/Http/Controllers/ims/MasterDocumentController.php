<?php

namespace App\Http\Controllers\ims;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\ims\HirarkiDocModel;
use App\Models\ims\MasterDocumentModel;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class MasterDocumentController extends Controller
{
    //

    public function index(Request $request){
        if($request->ajax()){
            $sop = MasterDocumentModel::select('ims_master_document.*', 'department.name as department', 'ims_hirarki_doc.name as hirarki')
            ->join('ims_hirarki_doc','ims_master_document.hirarki_doc', 'ims_hirarki_doc.id')   
            ->join('department','ims_master_document.id_dept', 'department.id')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/ims/action_master')
                ->addColumn('download', 'backend/ims/download_master')
                ->rawColumns(['action','download'])
                ->addIndexColumn()
                ->make(true);
        }

        $dept = DepartmentModel::all();
        $hirarki = HirarkiDocModel::all();
        return view('backend.ims.index', compact('dept','hirarki'));
    }


    public function store(Request $request)
    {
        //  validate field
        $name_file ='';
        $request->validate([
            'no_document' => 'required',
            'title' => 'required',
            'hirarki_doc' => 'required',
        ]);

        if($request->file('document') != null){
            $data = $request->file('document');
            $data->storeAs('public/ims/masterdocument', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc');
        }

        if($request->file('stamp') != null){
            $data = $request->file('stamp');
            $data->storeAs('public/ims/masterdocument', $data->hashName());
            $name_stamp = $data
            ->hashName();

        }else{
            $name_stamp = $request->input('doc_stamp');
        }

        $fm = MasterDocumentModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'no_document' => $request->input('no_document'),
            'title' => $request->input('title'),
            'hirarki_doc' => $request->input('hirarki_doc'),
            'id_dept' => $request->input('id_dept'),
            'remark' => $request->input('remark'),
            'document' => $name_file,
            'stamp' => $name_stamp
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = MasterDocumentModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = MasterDocumentModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/ims/masterdocument/'.$data->document));
        MasterDocumentModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }


    public function downloadMaster($file){

        $cek_file = MasterDocumentModel::select('hirarki_doc')
                    ->where('document',$file)
                    ->orWhere('stamp', $file)
                    ->first();
        // dd($cek_file);

        if($cek_file->hirarki_doc != 4){
            $filePath = public_path("storage/ims/masterdocument/".$file);
            $outputfilepath = public_path("storage/ims/masterdocument/output_".$file);
        
            $this->filePDF($filePath, $outputfilepath);
        
            return response()->file($outputfilepath);
        }else{
            $filePath = public_path("storage/ims/masterdocument/".$file);
    	    //$fileName = time().'-BIIE.dwg';

    	    return response()->download($filePath, $file);
        }
        
    }

    public function filePDF($file, $outputfilepath){

       

        $fpdi = new Fpdi();
        $count = $fpdi->setSourceFile($file);
  
        for($i = 1; $i<= $count; $i++){
          $template = $fpdi->importPage($i);
          $size = $fpdi->getTemplateSize($template);
          $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
          $fpdi->useTemplate($template);
          $fpdi->SetFont("helvetica", "", 15);
          $fpdi->SetFillColor(153,0,153);
  
          $left =10;
          $top = 10;
          $text = "UNCONTROLLED DOCUMENT";
  
        //   $fpdi->Text($left, $top, $text);
          $fpdi->Image(public_path("storage/ims/masterdocument/stmap_a4.png"), $top, $left, 50,12);
  
        }
  
        return $fpdi->Output($outputfilepath, 'F');
      }
}
