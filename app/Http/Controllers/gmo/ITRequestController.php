<?php

namespace App\Http\Controllers\gmo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\gmo\ITRequestModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ITRequestController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $req = ITRequestModel::select('gmo_it_request.*','department.name as department')
                ->join('department','gmo_it_request.id_department','department.id')
                ->where('id_user', Auth::user()->id)
                ->get();

            $datatables =  datatables()->of($req);
            return $datatables
                  ->addColumn('action', 'backend/gmo/it_request/action_request')
                  ->editColumn('date', function($data){ 
                     $created_date = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M Y');
                    
                    return  $created_date; 
                    })
                    ->editColumn('type', function($data){ 
                        if($data->type_request == 1){
                            return 'IT (' .$data->jenis_dukungan. ')';
                        }else{
                            return 'Media ('.$data->jenis_dukungan. ')';
                        }
                         
                    })
                    ->editColumn('verify', function($data){ 
                        if($data->verify_hod == 0){
                            return '<span class="badge badge-warning">Wait Approval HOD</span> ';
                        }else if($data->verify_hod == 1){
                            return '<span class="badge badge-success">Verify</span> ';
                        }else{
                            return '<span class="badge badge-danger">Reject</span> ';
                        }
                         
                    })
                    ->editColumn('status', function($data){ 
                        if($data->status == 0){
                            return '<span class="badge badge-dark">On Waiting</span> ';
                        }else if($data->status == 1){
                            return '<span class="badge badge-primary">On Going</span> ';
                        }else if($data->status == 2){
                            return '<span class="badge badge-success">Done</span> ';
                        }
                         
                    })

                  ->rawColumns(['action','verify','status'])
                 ->addIndexColumn()
                 ->make(true);
        }

        return view('backend.gmo.it_request.index');
    }

    public function store(Request $request){

        //  validate field
        $request->validate([
            'type_request' => 'required',
            'jenis_dukungan' => 'required',
            'deskripsi' =>'required'
        ]);

       

        $fm = ITRequestModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'id_user' => Auth::user()->id,
            'id_department' => Auth::user()->id_department,
            'type_request' => $request->input('type_request'),
            'jenis_dukungan' => $request->input('jenis_dukungan'),
            'email_req' => $request->input('email_req'),
            'user_req' => $request->input('user_req'),
            'internet_req' => $request->input('internet_req'),
            'backup_req' => $request->input('backup_req'),
            'download_req' => $request->input('download_req'),
            'perangkat_komputer_req' => $request->input('perangkat_komputer_req'),
            'desain_req' => $request->input('desain_req'),
            'email_desc' => $request->input('email_desc'),
            'username_desc' => $request->input('username_desc'),
            'download_desc' => $request->input('download_desc'),
            'download_perangkat' => $request->input('download_perangkat'),
            'deskripsi' => $request->input('deskripsi'),
            'download_desc' => $request->input('download_desc'), 
            'status' => 0,           
            ]
            
        );

        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function show($id){

        $show = ITRequestModel::select('gmo_it_request.*', 'users.name as name', 'department.name as department')
                    ->join('users','gmo_it_request.id_user','users.id')
                    ->join('department','gmo_it_request.id_department','department.id')
                    ->where('gmo_it_request.id',$id)
                    ->first();

        return Response()->json($show);
    }

    public function destroy($id){
        ITRequestModel::find($id)->delete($id);

            return Response()->json([
                'message' => 'Data deleted successfully!'
            ]);
    }

    public function requestList(Request $request){
        if($request->ajax()){
            $req = ITRequestModel::select('gmo_it_request.*','department.name as department','users.name as name')
                ->join('users','gmo_it_request.id_user','users.id')
                ->join('department','gmo_it_request.id_department','department.id')
                ->where('gmo_it_request.verify_hod', 1)
                ->get();

                $datatables =  datatables()->of($req);
                return $datatables
                      ->addColumn('action', 'backend/gmo/it_request/action_list')
                      ->editColumn('date', function($data){ 
                         $created_date = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M Y');
                        
                        return  $created_date; 
                        })
                        ->editColumn('type', function($data){ 
                            if($data->type_request == 1){
                                return 'IT (' .$data->jenis_dukungan. ')';
                            }else{
                                return 'Media ('.$data->jenis_dukungan. ')';
                            }
                             
                        })
                        ->editColumn('verify', function($data){ 
                            if($data->verify_hod == 0){
                                return '<span class="badge badge-warning">Wait Approval HOD</span> ';
                            }else if($data->verify_hod == 1){
                                return '<span class="badge badge-success">Verify</span> ';
                            }else{
                                return '<span class="badge badge-danger">Reject</span> ';
                            }
                             
                        })
                        ->editColumn('status', function($data){ 
                            if($data->status == 0){
                                return '<span class="badge badge-dark">On Waiting</span> ';
                            }else if($data->status == 1){
                                return '<span class="badge badge-primary">On Going</span> ';
                            }else if($data->status == 2){
                                return '<span class="badge badge-success">Done</span> ';
                            }
                             
                        })
    
                      ->rawColumns(['action','verify','status'])
                     ->addIndexColumn()
                     ->make(true);
        }

        return view('backend.gmo.it_request.list_request');
    }

    public function updateProgress(Request $request){
        $fm = ITRequestModel::updateOrCreate(
            ['id' => $request->input('id')],
            [
            'status' => $request->input('status'),           
            ]
            
        );

        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }
}
