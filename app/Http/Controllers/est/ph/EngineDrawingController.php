<?php

namespace App\Http\Controllers\est\ph;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\est\ph\PhEngineFileModel;
use App\Models\est\ph\PhEngineDrawingModel;

class EngineDrawingController extends Controller
{
    //
    public function index(Request $request){

        if($request->ajax()){
            $sop = PhEngineDrawingModel::select('*' )
                ->get();

            $datatables =  datatables()->of($sop);
            return $datatables
                  ->addColumn('action', 'backend/est/ph/action_engine')
                    // ->editColumn('created_at', function($data){ 
                    //     $formatedDate = Carbon::createFromFormat('Y-m-d', $data->created_at)->format('d M Y'); 
                    //     return $formatedDate; 
                    //     })
                  ->rawColumns(['action'])
                  ->addIndexColumn()
                  ->make(true);
        }
    }

    public function store(Request $request){

        if($request->ajax()){
            $tglBln = Carbon::now()->format('ym');
            $t_req = PhEngineDrawingModel::count();
            
            $request->validate([
                'engine_series' => 'required',
                'engine_code' => 'required',
                'voltage_output' => 'required',
                'capacity' => 'required',
                'merk' => 'required',
            ]);

            if($request->input('kode_drawing') == ''){
                if ($t_req == 0) {
                    $urut = 10000001;
                    $nomor = 'EST-PH-'. $tglBln . $urut;
                } else {
                    $last_req = PhEngineDrawingModel::all()->last();
                    $urut = (int) substr($last_req->kode_env, -8) + 1;
                    $nomor = 'EST-PH-'.$tglBln . $urut;
                }              
            }

            foreach($request->addMoreInputFields as $key => $value){
           
                $data = $request->file('addMoreInputFields.' . $key . '.document');
                $data->storeAs('public/est/ph/engine', $data->hashName());
                PhEngineFileModel::create(
                [
                    'kode_drawing' => $nomor,
                    'document' => $data->hashName(),
                    'manual_book' => $request->input('addMoreInputFields.' . $key . '.manual_book'),
                ]);
            }

            $fm = PhEngineDrawingModel::updateOrCreate(
                ['id' => $request->input('id_engine')],
                [
                'kode_drawing' => $nomor,
                'id_user' => Auth::user()->id,
                'name' => $request->input('name'),
                'engine_series' => $request->input('engine_series'),
                'engine_code' => $request->input('engine_code'),
                'voltage_output' => $request->input('voltage_output'),
                'capacity' => $request->input('capacity'),
                'status' => $request->input('status'),
                'merk' => $request->input('merk'),
                ]
            );
            // Session::flash('success', 'This is a message!'); 
            return response()->json(['data' => $fm, 'success' => true, 'message' => 'success'], 200);
        }
    }

    public function edit ($param){
        $show = PhEngineDrawingModel::select('*')
                    ->where('kode_drawing',$param)
                    ->first();
        return view('backend.est.ph.edit_engine', compact('param','show'));
    }

    public function drawing($param){
        $sop = PhEngineFileModel::select('*' )
                ->where('kode_drawing', $param)
                ->get();

                return DataTables::of($sop)
                        ->addIndexColumn()
                        // ->addColumn('action', function($row){
                        //        $btn = '<a href="javascript:void(0);" onClick="deleteData('.$row->id.')" class="btn font-15 btn-outline-danger btn-sm"><i class="las la-trash"></i></a>';
                        //        return $btn;
                        // })
                        // ->rawColumns(['action'])
                        ->make(true);
    }
}
