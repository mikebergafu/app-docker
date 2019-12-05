<?php

namespace App\Http\Controllers\Common;

use App\Category;
use App\Company;
use App\Helpers\BergyUtils;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use App\ViewedJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public $_validate = [
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'expires' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Jobs';
        $results = array();
        $results['jobs'] = Job::where('is_active', true)->get();
        $results['user_details'] = Auth::guard('admin')->user();
        //return 'ndsvnf';
        return view('all-common.job.index', compact('title', 'results'));
    }

    public function subscriber_form()
    {
        $title = 'Subscribe';
        $results = array();
        $results['jobs'] = Job::where('is_active', true)->get();
        $results['user_details'] = Auth::guard('admin')->user();

        return view('all-common.job.index', compact('title', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $title = 'Jobs';

        $results = array();
        $results['user_details'] = Auth::guard('admin')->user();
        $results['categories'] = Category::where('is_active', true)->get();
        return view('all-common.job.create', compact('title', 'results'));
    }

    public function create_with_poster(Company $company)
    {
        $title = 'Jobs';

        $results = array();
        $results['user_details'] = Auth::guard('admin')->user();
        $results['categories'] = Category::where('is_active', true)->get();
        return view('all-common.job.create-with-poster', compact('title', 'results', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
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

        if (
            $request->has_external_link === 'on' && $request->external_url === null || $request->has_external_link !== 'on') {
            return redirect()->back()->withErrors('Please provide an external link or Use the Company List to post a job');
        } elseif ($request->has_external_link === 'on' && $request->external_url !== null) {
            $job = new Job();

            $job->title = $request->get('title');
            $job->description = $request->get('description');
            $job->category_id = $request->get('category_id');

            $job->expires = $request->get('expires');
            $job->external_url = $request->get('external_url');
        } else {
            $job = new Job();

            $job->title = $request->get('title');
            $job->description = $request->get('description');
            $job->category_id = $request->get('category_id');
            $job->expires = $request->get('expires');
        }

        if ($request->get('has_external_link') !== null) {
            $job->has_external_link = true;
        }

        if ($request->get('is_active') !== null) {
            $job->is_active = true;
        } else {
            $job->is_active = false;
        }

        if ($request->get('is_free') !== null) {
            $job->is_free = true;
        } else {
            $job->is_free = false;
        }

        $job->user_type = 1;
        $job->created_by = Auth::guard('admin')->user()->id;
        $job->updated_by = Auth::guard('admin')->user()->id;

        if (Job::count() > 0) {
            if (Job::where([['is_free', $job->is_free], ['created_at', today()]])->exists()) {
                return redirect()->back()
                    ->withErrors('error', 'Sorry! You have only 1 Free Job under a category at a time.');
            }
        }

        //Save Admin User
        $job->save();

        return redirect()->back()
            ->with('success', 'Job/Listing created successfully');
    }

    public function store_with_poster(Request $request)
    {
        //$title = array('pageTitle' => Lang::get("Admin Register"));
        $validator = Validator::make($request->all(), $this->_validate);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (
            $request->has_external_link === 'on' && $request->external_url === null) {
            return redirect()->back()->withErrors('Please provide an external link or Uncheck the '."<i>Has External Link box</i>");
        } elseif ($request->has_external_link === 'on' && $request->external_url !== null) {
            $job = new Job();

            $job->title = $request->get('title');
            $job->description = $request->get('description');
            $job->category_id = $request->get('category_id');


            $job->expires = $request->get('expires');
            $job->external_url = $request->get('external_url');
            $job->job_poster_id = $request->get('job_poster_id');
        } else {
            $job = new Job();

            $job->title = $request->get('title');
            $job->description = $request->get('description');
            $job->category_id = $request->get('category_id');
            $job->expires = $request->get('expires');
            $job->job_poster_id = $request->get('job_poster_id');
        }

        if ($request->get('has_external_link') !== null) {
            $job->has_external_link = true;
        }

        if ($request->get('is_active') !== null) {
            $job->is_active = true;
        } else {
            $job->is_active = false;
        }

        if ($request->get('is_free') !== null) {
            $job->is_free = true;
        } else {
            $job->is_free = false;
        }

        $job->user_type = 1;
        $job->created_by = Auth::guard('admin')->user()->id;
        $job->updated_by = Auth::guard('admin')->user()->id;

        if (Job::count() > 0) {
            if (Job::where([['is_free', $job->is_free], ['created_at', today()]])->exists()) {
                return redirect()->back()
                    ->withErrors('error', 'Sorry! You have only 1 Free Job under a category at a time.');
            }
        }

        //Save Admin User
        $job->save();
        return redirect()->back()
            ->with('success', 'Job/Listing created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\JobCategory $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCategory $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function jobs_by_category(Category $category)
    {
        $title = 'Job Listings';
        $results['categories'] = Category::where('is_active', true)->get();
        $results['jobs'] = Job::where('category_id', $category->id)->get();
        //return $results;
        return view('subscriber.pages.jobs', compact('title', 'results', 'category'));
    }

    public function jobs_by_category_post(Request $request)
    {
        $title = 'Job Listings';
        $results['categories'] = Category::where('is_active', true)->get();
        $results['jobs'] = Job::where('category_id', $request->category_id)->get();
        $category = Category::where([['is_active', true], ['id', $request->category_id]])->first();
        return view('subscriber.pages.jobs', compact('title', 'results', 'category'));
    }

    public function job_details(Job $job)
    {

        $title = 'Job Details';
        $results['job'] = Job::where('id', $job->id)->get();
        //$results['categories'] = Category::where('is_active', true)->get();
        //return $title;
        $this->view_this_job($job->id);
        return view('subscriber.pages.job-details', compact('title', 'results'));
    }

    protected function view_this_job($job_id): void
    {
        $viewed = ViewedJobs::where([['job_id', $job_id], ['subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session())]]);
        if ($viewed->count() < 1) {
            $viewed_job = new ViewedJobs();
            $viewed_job->subscriber_id = BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());
            $viewed_job->job_id = $job_id;
            $viewed_job->save();
        }
    }

}
