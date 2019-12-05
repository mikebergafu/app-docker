<?php

namespace App\Http\Controllers\Common;

use App\Category;
use App\Helpers\BergyUtils;
use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobCategoryController extends Controller
{
    public $_validate = [
        'name' => 'required|unique:categories',
        'description' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Job Categories';
        $results = array();
        $results['categories'] = Category::where('is_active', true)->get();
        $results['user_details'] = Auth::guard('admin')->user();

        return view('all-common.job-category.index', compact('title','results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Job Categories';

        $results = array();
        $results['user_details'] = Auth::guard('admin')->user();
        $results['categories'] = Category::where('is_active', true)->get();
        return view('all-common.job-category.create', compact('title', 'results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$title = array('pageTitle' => Lang::get("Admin Register"));
        $validator = Validator::make($request->all(), $this->_validate);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();

        $category->name = $request->get('name');
        $category->description = $request->get('description');

        if ($request->get('is_active') !== null) {
            $category->is_active = true;
        } else {
            $category->is_active = false;
        }
        $category->user_type = 1;
        $category->created_by = Auth::guard('admin')->user()->id;
        $category->updated_by =  Auth::guard('admin')->user()->id;

        //Save Admin User
        $category->save();

        return redirect()->back()
            ->with('success', 'Category/Keyword created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $jobCategory)
    {
        //
    }
}
