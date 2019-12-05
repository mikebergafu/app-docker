<?php

namespace App\Http\Controllers\Admin;

use App\Administrator;
use App\ContentManager;
use App\ExternalContentManager;
use App\Helpers\BergyUtils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public $admin_validate = [
        'user_name' => 'required|unique:administrators',
        'name' => 'required',
        'email' => 'required|unique:administrators',
        'password' => 'required|string|min:6|confirmed',
    ];

    public function create()
    {
        $title = 'Add New User';
        $results = array();
        $results['admins'] = Administrator::all();
        $results['content_managers'] = ContentManager::all();
        $results['ec_managers'] = ExternalContentManager::all();
        $results['user_details'] = Auth::guard('admin')->user();
        return view('admin.pages.register', compact('title', 'results'));
    }

    public function create_content_manager()
    {
        $title = 'Add New User';
        $results = array();
        $results['admins'] = Administrator::all();
        $results['content_managers'] = ContentManager::all();
        $results['ec_managers'] = ExternalContentManager::all();
        $results['user_details'] = Auth::guard('admin')->user();
        return view('admin.pages.cm-register', compact('title', 'results'));
    }

    public function create_ec_manager()
    {
        $title = 'Add New User';
        $results = array();
        $results['admins'] = Administrator::all();
        $results['content_managers'] = ContentManager::all();
        $results['ec_managers'] = ExternalContentManager::all();
        $results['user_details'] = Auth::guard('admin')->user();
        return view('admin.pages.ec-register', compact('title', 'results'));
    }

    public function store(Request $request)
    {
        //$title = array('pageTitle' => Lang::get("Admin Register"));
        $validator = Validator::make($request->all(), $this->admin_validate);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //create the new Admin User Object
        if ($request->user_type === 1) {
            $admin = new Administrator();
        } elseif ($request->user_type === 2) {
            $admin = new ContentManager();
        }else{
            $admin = new ExternalContentManager();
        }

        $admin->user_name = $request->get('user_name');
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = Hash::make($request->get('password'));
        if ($request->get('is_blocked') !== null) {
            $admin->is_blocked = true;
        } else {
            $admin->is_blocked = false;
        }

        //Save Admin User
        $admin->save();

        return redirect()->route('admin-back-office-users', BergyUtils::uuid())
            ->with('success', 'Admin User created successfully');
    }
}
