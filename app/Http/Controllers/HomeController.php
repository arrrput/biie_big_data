<?php

namespace App\Http\Controllers;

use App\Mail\BigBataEmail;
use Notification;
use App\Models\User;
use App\Models\TeamModel;
use App\Models\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendEmailNotification;

class HomeController extends Controller
{
    //

    public function index(){

        $slider = SliderModel::all();
        $team = TeamModel::all();
        return view('frontend.home', compact('slider','team'));
    }

    public function sendnotification(){
        // $user = User::all();

        // $details = [
        //     'greeting' => 'Halo user',
        //     'body' => 'Test notifikasi email',
        //     'actiontext' => 'Subscribe this channel',
        //     'actionurl' => '/',
        //     'lastline' => 'last line text'
        // ];
        Mail::to("ari21putra@gmail.com")->send(new BigBataEmail);
 
		return "Email telah dikirim";

    }
}
