<?php

namespace App\Http\Controllers\gmo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\gmo\ITRequestModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Chart;

class ITRequestController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $req = ITRequestModel::select('gmo_it_request.*','department.name as department')
                ->join('department','gmo_it_request.id_department','department.id')
                ->where('id_user', Auth::user()->id)
                ->orderBy('gmo_it_request.created_at', 'DESC')
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
                            return '<span class="badge badge-primary">On Progress</span> ';
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
                                return '<span class="badge badge-primary">On Progress</span> ';
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
        $dt = Carbon::now();
        if($request->input('status') ==1){
            $fm = ITRequestModel::updateOrCreate(
                ['id' => $request->input('id')],
                [
                    'catatan' => $request->input('catatan'),
                'status' => $request->input('status'),  
                'date_start' => $dt->toDateString(),
                'work_by' => Auth::user()->id 
                ]
                
            );
        }
        else if($request->input('status') ==2){
            $fm = ITRequestModel::updateOrCreate(
                ['id' => $request->input('id')],
                [
                'catatan' => $request->input('catatan'),
                'status' => $request->input('status'),  
                'date_end' => $dt->toDateString(),
                'work_by' => Auth::user()->id     
                ]
            );
        }else{
            $fm = ITRequestModel::updateOrCreate(
                ['id' => $request->input('id')],
                [
                'catatan' => $request->input('catatan'),
                'status' => $request->input('status'),
                'work_by' => Auth::user()->id
                ]
            );
        }

        // Session::flash('success', 'This is a message!'); 
        return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
    }

    public function approveList(Request $request){
        if($request->ajax()){
            $req = ITRequestModel::select('gmo_it_request.*','department.name as department', 'users.name as nama')
                ->join('department','gmo_it_request.id_department','department.id')
                ->join('users','gmo_it_request.id_user','users.id')
                ->where('id_department', Auth::user()->id_department)
                ->where('verify_hod', 0)
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

                  ->rawColumns(['action'])
                 ->addIndexColumn()
                 ->make(true);
        }

        $req = ITRequestModel::select('gmo_it_request.*','department.name as department', 'users.name as nama')
                ->join('department','gmo_it_request.id_department','department.id')
                ->join('users','gmo_it_request.id_user','users.id')
                ->where('gmo_it_request.id_department', Auth::user()->id_department)
                ->where('verify_hod', 0)
                ->get();

        return view('backend.gmo.it_request.list_approve', compact('req'));
    }

    public function approveUser($id){
       
        $fm = ITRequestModel::updateOrCreate(
            ['id' => $id],
            [
            'verify_hod' => 1,           
            ] 
        );

        return redirect()->back()->with('success','Request telah di approve');
    }
    

    public function rejectUser($id){
       
        $fm = ITRequestModel::updateOrCreate(
            ['id' => $id],
            [
            'verify_hod' => 2,           
            ] 
        );

        return redirect()->back()->with('success','Request telah di approve');
    }

    public function verifyUser($id){
       
        $fm = ITRequestModel::updateOrCreate(
            ['id' => $id],
            [
            'verify_user' => 1,           
            ] 
        );

        return redirect()->back()->with('success','Request telah di approve');
    }

    public function showRespon($id){
        $show = ITRequestModel::select('gmo_it_request.*', 'users.name as nama_it','users.image as avatar')
                    ->join('users','gmo_it_request.work_by','users.id')
                    ->where('gmo_it_request.id',$id)
                    ->first();

        return Response()->json($show);
    }
    
    public function chart(){

        $current = Carbon::now();
        $bulan_lalu = $current->subMonth(1)->toDateTimeString();

        $bl = Carbon::parse($bulan_lalu)->format('m');

        // total IT request
        $table_total_it = ITRequestModel::select('type_request', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                ->where('gmo_it_request.type_request',1)
                ->Where('verify_user', 1)
                ->whereMonth('gmo_it_request.created_at', $bl)
                ->first();
        $total_it_close = $table_total_it->total;

        $table_open_it = ITRequestModel::select('type_request', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                ->where('gmo_it_request.type_request',1)
                ->Where('verify_user', null)
                ->whereMonth('gmo_it_request.created_at', $bl)
                ->first();
        $total_it_open = $table_open_it->total;

        // Total Media Request
        $table_total_media = ITRequestModel::select('type_request', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                ->where('gmo_it_request.type_request',2)
                ->Where('verify_user', 1)
                ->whereMonth('gmo_it_request.created_at', $bl)
                ->first();
        $total_media_close = $table_total_media->total;

        $table_open_media = ITRequestModel::select('type_request', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                ->where('gmo_it_request.type_request',2)
                ->Where('verify_user',null)
                ->whereMonth('gmo_it_request.created_at', $bl)
                ->first();
        $total_media_open = $table_open_media->total;
        
        $groups_it_total = ITRequestModel::select('department.name as department', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                  ->join('department', 'gmo_it_request.id_department','department.id')
                  ->where('type_request', 1)
                  ->where('gmo_it_request.verify_user',1)
                  ->whereMonth('gmo_it_request.created_at', $bl)
                  ->groupBy('department')
                  ->pluck('total', 'department')
                  ->all();
        

        $table_it = ITRequestModel::select('department.name as department', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                ->join('department', 'gmo_it_request.id_department','department.id')
                ->where('type_request', 1)
                ->whereMonth('gmo_it_request.created_at', $bl)
                ->groupBy('department')
                ->get();
        $groups = ITRequestModel::select('department.name as department', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                  ->join('department', 'gmo_it_request.id_department','department.id')
                  ->where('type_request', 1)
                  ->whereMonth('gmo_it_request.created_at', $bl)
                  ->groupBy('department')
                  ->pluck('total', 'department')
                  ->all();
        
        $table_media = ITRequestModel::select('department.name as department', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                    ->join('department', 'gmo_it_request.id_department','department.id')
                    ->where('type_request', 2)
                    ->whereMonth('gmo_it_request.created_at', $bl)
                    ->groupBy('department')
                    ->get();

        $groups_media = ITRequestModel::select('department.name as department', ITRequestModel::raw('count(*) as total, MONTH(gmo_it_request.created_at) month'))
                  ->join('department', 'gmo_it_request.id_department','department.id')
                  ->where('type_request', 2)
                  ->whereMonth('gmo_it_request.created_at', $bl)
                  ->groupBy('department')
                  ->pluck('total', 'department')
                  ->all();
       
       if(count($groups) > 0){
        for ($i=1; $i<=count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
       }else{
           $colours='0';
       }

       if(count($groups_media) > 0){
        for ($i=1; $i<=count($groups_media); $i++) {
            $colours_media[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
       }else{
           $colours_media='0';
       }

       $labels  = array_keys($groups);
       $dataset = array_values($groups);

       $labels_media  = array_keys($groups_media);
       $dataset_media = array_values($groups_media);

        
        return view('backend.gmo.it_request.chart',compact('table_it','table_media','colours','labels',
                    'dataset', 'colours_media','labels_media','dataset_media',
                'total_it_open','total_it_close','total_media_close','total_media_open'));
    }

}
