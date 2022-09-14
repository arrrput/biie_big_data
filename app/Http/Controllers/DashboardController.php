<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use App\Models\EstateDownload;
use App\Events\NotificationEvent;
use App\Models\BangunanModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index(){
                   
        //notif
        // NotificationEvent::dispatch('Notice Update'. Auth::user()->name);
        $data = BangunanModel::select('*')->where('user_id','=', Auth::user()->id)
                ->whereDate('due_date','>=', Carbon::today())
                ->get();
        $now = Carbon::now();
        $list_date = [];
        $b=0;
        $key=0;
        foreach($data as $date){
            $beda_hari = $now->diffInDays($date->due_date);
            if($beda_hari < 100  ){
                $list_date[$b] = ['title' => $date->name, 'selisih_hari' => $beda_hari, 
                'due_date' => Carbon::parse($date->due_date)->diffForHumans() ];
                $b++;
            }
            $key++;
        } //dd($list_date);

        $n = count($list_date);
        $tot_file_draw = DataModel::all()
            ->count();

        $request_pending = EstateDownload::where('status','=', 0)
                ->count();
        $request_accept = EstateDownload::where('status','=', 1)
                ->count();  
        $request_reject = EstateDownload::where('status','=', 2)
                ->count();  
            return view('backend.dashboard.index', compact('n','request_pending','request_accept','tot_file_draw','request_reject','list_date'));
        }
}
