<?php

namespace App\Http\Controllers\hrga;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\hrga\EmployeeModel;
use App\Models\hrga\JobGradeModel;
use App\Models\hrga\EmployeeImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Models\hrga\ContractEmployeeModel;
use App\Models\hrga\GasolineModel;
use App\Models\hrga\RecruitmentModel;
use App\Models\hrga\StatusRecruitmentModel;

class EmployeeController extends Controller
{
    //

    public function index(Request $request){


        if($request->ajax()){
            $sop = EmployeeModel::select('hrga_employee.*', 'hrga_job_grade.name as job')
                ->join('hrga_job_grade','hrga_employee.job_grade', 'hrga_job_grade.id')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/hrga/action_employee')
                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }

        $data = ContractEmployeeModel::select('*')
                ->whereDate('date_end','>=', Carbon::today())
                ->get();
        $now = Carbon::now();
        $list_date = [];
        $b=0;
        $key=0;
        foreach($data as $date){
            $beda_hari = $now->diffInDays($date->date_end);
            if($beda_hari < 45  ){
                $list_date[$b] = ['title' => $date->name, 'selisih_hari' => $beda_hari, 
                'due_date' => Carbon::parse($date->date_end)->diffForHumans() ];
                $b++;
            }
            $key++;
        }

        $recr = RecruitmentModel::select('*')
                ->whereDate('due_date','>=', Carbon::today())
                ->get();
        $list_recr = [];
        $recr_b=0;
        $recr_key=0;
        foreach($recr as $date){
            $beda_hari = $now->diffInDays($date->due_date);
            if($beda_hari < 10  ){
                $list_recr[$recr_b] = ['title' => $date->job_position, 'selisih_hari' => $beda_hari, 
                'due_date' => Carbon::parse($date->due_date)->diffForHumans() ];
                $recr_b++;
            }
            $recr_key++;
        }

        $n = count($list_date);
        $total_recruitment = count($list_recr);

        $job_grade = JobGradeModel::all();
        $dept = DepartmentModel::all();
        $progress = StatusRecruitmentModel::all();
        return view('backend.hrga.index', compact('job_grade','dept', 'progress','n','list_date','list_recr','total_recruitment'));
    }

    

    public function import_excel(Request $request) 
	{
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		Excel::import(new EmployeeImport, $request->file('file')->store('temp') );
 
		Session::flash('success','Data Factory Berhasil Diimport!');
 
		return redirect('/hrga/employee');
	}

    public function store(Request $request)
    {
        //  dd($request->all());
        $no_emp = EmployeeModel::select('no_emp')->orderBy('created_at', 'desc')->first();
        if($request->input('no_emp') == null){
            $nw = $no_emp->no_emp+1;
            $jml_car = strlen($nw);
            if($jml_car ==3){
                $new_no_emp = "0".$nw;
            }else{
                $new_no_emp = $nw;
            }
        }else{
            $new_no_emp = $request->input('no_emp');
        }
        $request->validate([
            'name' => 'required',
            'job_grade' => 'required',

        ]);

        $fm = EmployeeModel::updateOrCreate(
            ['id' => $request->input('id_employee')],
            [
            'name' => $request->input('name'),
            'no_emp' => $new_no_emp,
            'designation' => $request->input('designation'),
            'job_title' => $request->input('job_title'),
            'job_grade' => $request->input('job_grade'),
            'education' => $request->input('education'),
            'department' => $request->input('department'),
            'join' => $request->input('join'),
            'sex' => $request->input('sex'),
            'status' => $request->input('status'),
            'child' => $request->input('child'),
            'dob' => $request->input('dob'),
            'place_of_birth' => $request->input('place_of_birth'),
            'stay' => $request->input('stay'),
            'religion' => $request->input('religion'),
            'kjp' => $request->input('kjp'),
            'npwp' => $request->input('npwp'),
            'nik' => $request->input('nik'),
            'status_emp' => $request->input('status_emp'),
            'no_hp' => $request->input('no_hp'),
            'email' => $request->input('email'),
            'no_rek' => $request->input('no_rek'),
            'address' => $request->input('address')

            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){

        $show = EmployeeModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        EmployeeModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function gasoline(Request $request){
        if($request->ajax()){
            $sop = GasolineModel::select('*')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/hrga/gasoline_action')
                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }
    }

    public function showGas($id){
        $show = GasolineModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function storeGas(Request $request)
    {
        //  validate field

       
        $request->validate([
            'merk_plat' => 'required',
            'driver' => 'required',
            'km' => 'required',
            'date' => 'required',
            'price' => 'required',
        ]);

        $fm = GasolineModel::updateOrCreate(
            [
                'id' => $request->input('id')],
            [
                'merk_plat_no' => $request->input('merk_plat'),
                'driver' => $request->input('driver'),
                'km' => $request->input('km'),
                'date' => $request->input('date'),
                'price' => $request->input('price')
            ]
            
        );
        
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function destroyGas($id){
        GasolineModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
