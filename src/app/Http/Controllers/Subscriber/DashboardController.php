<?php

namespace App\Http\Controllers\Subscriber;

use App\AppliedJobs;
use App\MSISDN;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function applied_jobs_list(){
        $title = 'My Applied Jobs';

        $applied_jobs = AppliedJobs::where('subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))
            ->leftJoin('jobs', 'applied_jobs.job_id', 'jobs.id')
            ->leftJoin('categories', 'jobs.category_id', 'categories.id')
            ->select('applied_jobs.id as id','jobs.title as title',
                'jobs.description as description','categories.id as category_id','categories.name')
            ->get();

        //return $applied_jobs;
        return view('subscriber.dashboard.pages.applied-jobs', compact('title','applied_jobs'));
    }

    public function settings(){
        $title = 'Settings';

        $sub_msisdn = MSISDN::where('subscriber_id',BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))->exists();
        if($sub_msisdn){
            $sub_status = MSISDN::where('subscriber_id',BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))->first()->is_subscribed;
        }else{
            $sub_status =0;
        }

        return view('subscriber.dashboard.pages.settings', compact('title','sub_status'));
    }

    public function subscribe_me(){
        $my_id =BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());

        $sub_msisdn = MSISDN::where('subscriber_id',BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))->exists();
        if($sub_msisdn){
            $is_sub = MSISDN::where('subscriber_id',$my_id)->first()->is_subscribed;

            if($is_sub === 1) {
                DB::update('update m_s_i_s_d_n_s set is_subscribed = 0 where subscriber_id = ?', [$my_id]);
                alert('Just want you to know', 'You have been unsubscribed','info');

                return redirect()->back();
            }
            DB::update('update m_s_i_s_d_n_s set is_subscribed = 1 where subscriber_id = ?', [$my_id]);
            alert('Just want you to know', 'You have been unsubscribed','info');
            return redirect()->back();
        }
        alert('Just want you to know', 'Couldnt complete the action','info');
        return redirect()->back();
    }
}
