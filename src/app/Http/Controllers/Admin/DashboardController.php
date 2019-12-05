<?php

namespace App\Http\Controllers\Admin;

use App\Administrator;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function welcome()
    {
        $title = 'Welcome';

        return view('admin.pages.welcome', compact('title'));
    }

    public function admin()
    {
        return redirect()->route('admin-welcome');
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        $results = array();

        $results['user_details'] = Auth::guard('admin')->user();
        //return $results;
        return view('admin.pages.dashboard', compact('title', 'results'));
    }

    public function adminUsers()
    {
        return Administrator::all();
    }

    public function companies()
    {
        $title = 'Companies List';
        $companies = Company::all();
        return view('admin.pages.company.index', compact('companies', 'title'));
    }

    public function create_company()
    {
        $title = 'Companies List';
        return view('admin.pages.company.add-company', compact( 'title'));
    }

    public function store_company(Request $request)
    {
        $poster = new Company();
        $poster->name = $request->name;
        $poster->introduction = $request->introduction;
        $poster->address = $request->address;
        $poster->email = $request->email;
        $poster->phone1 = $request->phone1;
        $poster->created_by = \auth()->guard('admin')->user()->id;
        $poster->updated_by = \auth()->guard('admin')->user()->id;


        if (!$poster->save()) {

            alert('Just to let you know', 'Ooops! Cound not save Job Poster details. Please tyr again', 'danger');
            return redirect()->back();
        }

        return redirect()->back()->with('success', 'Save successfully');
    }
}
