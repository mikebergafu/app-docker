<?php

namespace App\Http\Controllers\ECManager;

use App\Events\Subscribed;
use App\Helpers\ChartUtils;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Khill\Lavacharts\Laravel\LavachartsFacade;
use Khill\Lavacharts\Lavacharts;


class DashboardController extends Controller
{

    public function welcome(){
        $title = 'Welcome';

        return view('ec-manager.pages.welcome', compact('title'));
    }

    public function ec_manager(){
        return redirect()->route('ecm-welcome');
    }

    public function dashboard(){
        $title ='Dashboard';
        $results = array();

        ChartUtils::bar();
        ChartUtils::gaugeChart();
        ChartUtils::new_g();

        $results['user_details']= Auth::guard('ec_manager')->user();
        //return $results;
        return view('ec-manager.pages.dashboard', compact('title', 'results'));
    }

}
