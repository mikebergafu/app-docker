<?php

namespace App\Http\Controllers\Admin;

use App\Administrator;
use App\ContentManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackOfficeUserController extends Controller
{


    public function index(){
        $title = 'Subscribers';

        $results = array();
        $results['user_details']= Auth::guard('admin')->user();
        return view('admin.pages.user-mgt.index', compact('title','results'));
    }
}
