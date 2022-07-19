<?php

namespace App\Http\Controllers;

use App\Models\SliderModel;
use App\Models\TeamModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

        $slider = SliderModel::all();
        $team = TeamModel::all();
        return view('frontend.home', compact('slider','team'));
    }
}
