<?php

namespace App\Http\Controllers\Admin;

use App\Administrator;
use App\ContentManager;
use App\ExternalContentManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $title = 'System Users';

        $results = array();
        $results['admins'] = Administrator::all();
        $results['content_managers'] = ContentManager::all();
        $results['ec_managers'] = ExternalContentManager::all();
        $results['user_details'] = Auth::guard('admin')->user();
        return view('admin.pages.user-mgt.index', compact('title','results'));
    }
}
