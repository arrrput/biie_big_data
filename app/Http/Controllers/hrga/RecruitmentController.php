<?php

namespace App\Http\Controllers\hrga;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\hrga\RecruitmentModel;

class RecruitmentController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax()){
            $sop = RecruitmentModel::select('hrga_recruitment.*','hrga_status_recruitment.name as progress','department.name as department')
                ->join('hrga_status_recruitment', 'hrga_recruitment.id_progress','hrga_status_recruitment.id')
                ->join('department', 'hrga_recruitment.id_department','department.id')
                ->orderBy('due_date','DESC')
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/hrga/action_recruitment')
                  ->editColumn('status','backend/hrga/status_column')
                  ->rawColumns(['action','status'])
                  ->editColumn('due_date', function($data){ 
                      $formatedDate = Carbon::createFromFormat('Y-m-d', $data->due_date)->format('d M Y'); 
                      return $formatedDate; 
                    })
                 ->addIndexColumn()
                 ->make(true);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //  validate field
        $request->validate([
            'id_department' => 'required',
            'job_position' => 'required',

        ]);

        $fm = RecruitmentModel::updateOrCreate(
            ['id' => $request->input('id_recruitment')],
            [
            'id_department' => $request->input('id_department'),
            'job_position' => $request->input('job_position'),
            'id_progress' => $request->input('progress'),
            'due_date' => $request->input('due_date'),
            ]
            
        );
        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);

    }

    public function show($id){
        $show = RecruitmentModel::select('*')
                    ->where('id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        RecruitmentModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }
}
