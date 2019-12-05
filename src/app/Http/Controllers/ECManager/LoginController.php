<?php

namespace App\Http\Controllers\ECManager;

use App\Helpers\BergyUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public $admin_validate = [
        'user_name' => 'required',
        'password' => 'required|string|min:6',
    ];

    public function create()
    {
        $title = 'Login';
        return view('ec-manager.pages.login', compact('title'));
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

        $credentials = array(
            'user_name' => $request->get('user_name'),
            'password' => $request->get('password'),
            'is_blocked'=> 0
        );

        if(Auth::guard('ec_manager')->attempt($credentials)){

           return redirect()->route('ecm-dashboard', BergyUtils::uuid())
                ->with('success','Login successfully');
        }


     return redirect()->back()
            ->withErrors('Sorry! We Could \'nt login you in. Check Username or Password');
    }

    public function logout(Request $request) {
        session()->flush();
        Auth::guard('ec_manager')->logout();
       return redirect()->to('/ec-manager/login')
            ->with('message','You have successfully logged out');

    }
}
