<?php

namespace App\Http\Controllers\aml;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\aml\PerizinanModel;
use App\Http\Controllers\Controller;
use App\Models\aml\PermitOwnerModel;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Variable\Periodic;

class PerizinanController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:contract aml-manage||permit aml-manage', ['only' => ['index']]);
         
    }
    public function index(Request $request){

        if($request->ajax()){
            $sop = PerizinanModel::select('*')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->editColumn('tgl_berakhir', function($data){ 
                    $formatedDate = Carbon::createFromFormat('Y-m-d', $data->tgl_berakhir)->format('d M Y'); 
                    return $formatedDate; 
                })
                  ->addColumn('action', 'backend/aml/action_perizinan')
                  ->addColumn('download','backend/aml/download_contract')
                  ->rawColumns(['action','download'])
                  ->addIndexColumn()
                  ->make(true);
        }

        $permit_owner =  PermitOwnerModel::all();

        return view('backend.aml.perizinan',compact('permit_owner'));
    }

    public function store(Request $request)
    {
        //  validate field
        $name_file ='';
        $request->validate([
            'contract_number' => 'required'
        ]);

        if($request->file('document') != null){
            $data = $request->file('document');
            $data->storeAs('public/aml/contract', $data->hashName());
            $name_file = $data
            ->hashName();

        }else{
            $name_file = $request->input('doc');
        }

        $fm = PerizinanModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'no_perjanjian' => $request->input('contract_number'),
            'type_perjanjian' => $request->input('type_contract'),
            'deskripsi' => $request->input('description'),
            'mitra' => $request->input('mitra'),
            'bussiness_owner' => $request->input('bussiness_owner'),
            'tgl_mulai' => $request->input('start_date'),
            'tgl_berakhir' => $request->input('end_date'),
            'tgl_perpanjang' => $request->input('renewal_date'),
            'tgl_penerbitan' => $request->input('publication_date'),
            'document' => $name_file
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }
    
    public function show($id){
        $show = PerizinanModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        $data = PerizinanModel::select('document')->where('id', $id)->first();
        unlink(storage_path('app/public/aml/contract/'.$data->document));
        PerizinanModel::find($id)->delete($id);
            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function downloadContract($file){
        $filePath = public_path("storage/aml/contract/".$file);
    	//$fileName = time().'-BIIE.dwg';

    	return response()->download($filePath, $file);
    }
}
