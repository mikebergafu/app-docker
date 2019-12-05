<?php

namespace App\Http\Controllers\Subscriber;

use App\AppliedJobs;
use App\Company;
use App\Helpers\BergyUtils;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationREQ;
use App\Job;
use App\Jobs\SendApplicationEmail;
use App\Mail\ApplicationEmail;
use App\Mail\SendSubscriptionConfirmEmail;
use App\MSISDN;
use App\Skill;
use App\SubscriberSkill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply_job($job_id, $applicant_email){
        //Check if Applicant has already applied for this job
        $is_applied = AppliedJobs::where([
            ['subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()) ]
            ,['job_id',$job_id]])->count();

        if($is_applied > 0){
            alert('Job Application Notice','You have already applied for '. BergyUtils::getJobTitle($job_id),'info');
            return redirect()->back();
        }

        $apply = new AppliedJobs();
        $apply->subscriber_id = BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());
        $apply->job_id = $job_id;

        if(!$apply->save()){
            alert('Job Application Notice','Oops! Something went wrong','danger');
        }
        $job = Job::where('id',$job_id)->first();
        SendApplicationEmail::dispatch($job,env('JOB_POSTER_EMAIL'),$applicant_email );
        alert('Job Application Notice','You have successfully applied for '. BergyUtils::getJobTitle($job_id),'success');

        return redirect()->back();
    }

    public function add_skill(Request $request){
        //Check if Applicant has already applied for this job
        $is_added = SubscriberSkill::where([
            ['subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()) ]
            ,['skill_id',$request->skill_id]])->count();

        if($is_added > 0){
            alert('Subscriber Notice','You have already Added '. BergyUtils::getSkill($request->skill_id),'info');
            return redirect()->back();
        }

        $skill = new SubscriberSkill();
        $skill->subscriber_id = BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());
        $skill->skill_id = $request->skill_id;

        if(!$skill->save()){
            alert('Subscriber Notice','Oops! Something went wrong','danger');
        }
        alert('Subscriber Notice','You have successfully added '. BergyUtils::getSkill($request->skill_id),'success');
        return redirect()->back();
    }


    public function add_education(Request $request){
      return $request;
    }

    public function skills(){
        return Skill::all();
    }

    protected function prepare_job($job, $post_email, $applicant_email){
        $baseDelay = json_encode(now());

        $getDelay = json_encode(
            cache('jobs.' . ApplicationEmail::class, $baseDelay)
        );
        $setDelay = Carbon::parse(
            $getDelay->date
        )->addSeconds(10);

        cache([
            'jobs.' . ApplicationEmail::class => json_encode($setDelay)
        ], 5);

        SendApplicationEmail::dispatch($job,env('JOB_POSTER_EMAIL'),$applicant_email,
            new ApplicationEmail($this->job_poster('Berg & Co',$post_email, env('TEST_MSISDN'))) )
            ->delay($setDelay);

    }

    protected function job_poster($name,$email ,$phone_number){
        $this_poster = new Company();
        $this_poster->name = $name;
        $this_poster->email = $email;
        $this_poster->phone_number = $phone_number;

        return $this_poster;
    }

    public function do_jo_application(JobApplicationREQ $req){
        //$job_id, $applicant_email
        //Get MSISDN Subscriber ID with msisdn
        $subscriber_id = MSISDN::where('msisdn', BergyUtils::getActualMsisdn() )->first()->id;
        //Check if Applicant has already applied for this job
        $is_applied = AppliedJobs::where([
            ['subscriber_id', $subscriber_id ]
            ,['job_id',$req->job_id]])->count();

        if($is_applied > 0){
            alert('Job Application Notice','You have already applied for '. BergyUtils::getJobTitle($req->job_id),'info');
            return redirect()->back();
        }

        $apply = new AppliedJobs();
        $apply->subscriber_id = BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());
        $apply->job_id = $req->job_id;

        if(!$apply->save()){
            alert('Job Application Notice','Oops! Something went wrong','danger');
        }
        $job = Job::where('id',$job_id)->first();
        SendApplicationEmail::dispatch($job,env('JOB_POSTER_EMAIL'),$applicant_email );
        alert('Job Application Notice','You have successfully applied for '. BergyUtils::getJobTitle($job_id),'success');

        return redirect()->back();
    }
}
