<?php

namespace App\Http\Controllers\ContentManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function welcome(){
        $title = 'Welcome';

        return view('content-manager.pages.welcome', compact('title'));
    }

    public function content_manager(){
        return redirect()->route('cm-welcome');
    }
    public function dashboard(){
        $title ='Dashboard';
        $results = array();

        $results['user_details']= Auth::guard('content_manager')->user();
        //return $results;
        return view('content-manager.pages.dashboard', compact('title', 'results'));
    }
}
