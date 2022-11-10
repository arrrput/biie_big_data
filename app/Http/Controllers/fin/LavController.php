<?php

namespace App\Http\Controllers\fin;

use App\Models\fin\LavModel;
use Illuminate\Http\Request;
use App\Models\fin\LavImport;
use App\Exports\fin\LavExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class LavController extends Controller
{
    //


    public function index(Request $request){

        if($request->ajax()){
            $sop = LavModel::select('*')
            ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                ->addColumn('action', 'backend/fin/action_lav')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }


    public function store(Request $request)
    {
        //  validate field
        $request->validate([
            'vendor_no' => 'required',
            'vendor_name' => 'required',
            
        ]);

       

        $fm = LavModel::updateOrCreate(
            ['id' => $request->input('id_lav')],
            [
            'vendor_no' => $request->input('vendor_no'),
            'vendor_name' => html_entity_decode($request->input('vendor_name')),
            'address' => $request->input('address'),
            'contact_person' => $request->input('contact_person'),
            'contact_number' => $request->input('contact_number'),
            'email' => $request->input('email')
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }


    public function show($id){
        $show = LavModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        LavModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function export_excel()
	{
		return Excel::download(new LavExport, 'LavFinance.xlsx');
	}

    public function import_excel(Request $request) 
	{
       
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		Excel::import(new LavImport, $request->file('file')->store('temp') );
 
		Session::flash('success','Data Dormitory Berhasil Diimport!');
 
		return redirect('/fin/procurement');
	}

}
