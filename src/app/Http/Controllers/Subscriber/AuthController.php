<?php

namespace App\Http\Controllers\Subscriber;

use App\Administrator;
use App\ContentManager;
use App\Helpers\BergyUtils;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public $subscriber_login_validate = [
        'user_name' => 'required',
        'password' => 'required|string|min:6',
    ];

    public $subscriber_register_validate = [
        'user_name' => ['required'],
        'email' => ['required', 'string', 'email', 'max:100', 'unique:subscribers'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'first_name'=> ['required','max:50'],
        'last_name'=> ['required','max:50'],
        'other_names'=> ['required, sometime'],
        'phone_number'=> ['required', 'max:10'],
        'optional_phone'=> ['required', 'sometimes'],

    ];

    public  function login(){
        $title = 'Login';
        session()->put('do_subscribe', 0);
        return view('subscriber.auth.login', compact('title'));
    }

    public  function process_login(Request $request){


        $validator = Validator::make($request->all(), $this->subscriber_login_validate);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = array(
            'phone_number' => $request->get('user_name'),
            'password' => $request->get('password'),
            'is_blocked'=> 0,
            'is_subscribed' => 1
        );

        if(Auth::guard('subscriber')->attempt($credentials)){
            return redirect()->route('subscriber-home', BergyUtils::uuid())
                ->with('success','Login successfully');
        }

        return redirect()->back()
            ->withErrors('Sorry! We Couldn\'t login you in. Check Username or Password');

    }

    public  function register(){
        $title = 'Register';

        return view('subscriber.auth.register', compact('title'));
    }

    public  function process_register(Request $request){
        $title = 'Register';



        //$title = array('pageTitle' => Lang::get("Admin Register"));
        $validator = Validator::make($request->all(), $this->subscriber_register_validate);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //return $request;
        //create the new Subscriber User Object
        $subscriber = new Subscriber();

        $subscriber->subscriber_id = strtolower(BergyUtils::uuid()) ;
        $subscriber->user_name = $request->get('user_name');
        $subscriber->first_name = $request->get('first_name');
        $subscriber->last_name = $request->get('last_name');
        $subscriber->phone_number = '233'.$request->get('phone_number');
        $subscriber->email = $request->get('email');
        if ($request->other_name !== null) {
            $subscriber->other_names = $request->get('other_name');
        } else {
            $subscriber->other_names = 'none';
        }


        if ($request->optional_phone !== null) {
            $subscriber->optional_phone = '233'.$request->get('optional_phone');
        } else {
            $subscriber->optional_phone = '233'.'000000000';
        }

        $subscriber->password = Hash::make($request->get('password'));
        $subscriber->is_blocked = false;
        $subscriber->is_subscribed = true;


        $subscriber->save();

        return redirect()->route('subscriber-home', BergyUtils::uuid())
            ->with('success', 'Registration Completed successfully');
    }

    public function logout1(Request $request) {
        session()->flush();
        session()->put('do_subscribe', 0);
        Auth::guard('subscriber')->logout();
        return redirect()->route('subscriber-login-form', BergyUtils::uuid())
            ->with('message','You have successfully logged out');

    }

    public function logout(Request $request) {
        session()->flush();
        Auth::guard('subscriber')->logout();
        return redirect()->route('subscriber-welcome', BergyUtils::uuid())
            ->with('message','You have successfully logged out');

    }
}
