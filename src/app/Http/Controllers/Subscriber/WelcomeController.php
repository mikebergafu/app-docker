<?php

namespace App\Http\Controllers\Subscriber;

use App\Category;
use App\Company;
use App\Helpers\BergyUtils;
use App\Http\Controllers\Controller;
use App\Job;
use App\Jobs\SendApplicationEmail;
use App\Jobs\SendEmailTest;
use App\Jobs\SendJobPostingAlert;
use App\MSISDN;
use App\SubscriberVerifier;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()
    {
        $title = 'Welcome';
        $categories = Category::where('is_active', true)->paginate(10);

        $jobs = Job::where('is_active', true)->paginate(10);

        if (Request::ajax()) {
            return view('subscriber.grids.categories-grid', compact('categories', 'jobs'));
        }
        return view('subscriber.pages.welcome', compact('title', 'categories', 'jobs'));
    }

    public function send_msdn($job_id)
    {
        $title = 'Check Subscription';
        $categories = Category::where('is_active', true)->paginate(6);

        return view('subscriber.pages.send-msdn', compact('title', 'categories', 'job_id'));
    }

    public function subscribe_form($job_id)
    {
        $title = 'Check Subscription';
        $categories = Category::where('is_active', true)->paginate(6);

        $jobs = Job::where('is_active', true)->paginate(10);
        return view('subscriber.pages.subscribe-msdn', compact('title', 'categories', 'job_id', 'jobs'));
    }

    public function subscribe_store(Request $request)
    {
        $title = 'Subscribe';
        //$results['categories'] = Category::where('is_active', true)->get();
        $phone = new MSISDN();
        $phone->subscriber_id = 1;
        $phone->msisdn = $request->msdn;
        $phone->network = 'mtn';

        $phone->save();

        //return $request;
        if ($this->get_subscribed_msdn($request->msdn) === 1) {
            //Session::put('msdn', $request->msdn);

            $data = array(
                'code' => 200,
                'message' => 'success',
                'url' => redirect()
                    ->route('jobs-details', [$request->job_id, BergyUtils::uuid()])
                    ->with('success', 'You have been subscribed successfully'),
            );

        } else {
            $data = array(
                'code' => 401,
                'message' => 'Cant Subscribe',
                'url' => redirect()->back()
                    ->with('error', 'Sorry! We couldn\'t Subscribe you'),
            );
        }
        //Session::flush();

        return $data['url'];

    }

    public function confirm_msdn(Request $request)
    {
        //return $request;
        if ($this->get_subscribed_msdn($request->msdn) === 1) {
            Session::put('msdn', $request->msdn);

            //Create Verification Code

            //Sen verification Code by SMS
            $data = array(
                'code' => 200,
                'message' => 'success',
                'url' => redirect()
                    ->route('jobs-details', [$request->job_id, BergyUtils::uuid()])
                    ->with('success', 'Your Subscribe has successfully been confirmed'),
            );
            //Return response

        } else {
            $data = array(
                'code' => 401,
                'message' => 'not subscribed',
                'url' => redirect()->back()
                    ->with('error', 'No Subscription data was found for (' . $request->msdn . '), Please Subscribe'),
            );
        }
        //Session::flush();

        return $data['url'];

    }

    public function send_confirm_sms_form($job_id)
    {
        $title = 'Confirm Subscription';
        $results['categories'] = Category::where('is_active', true)->get();

        return view('subscriber.pages.confirm-subscription', compact('title', 'results', 'job_id'));
    }

    public function send_confirm_sms(Request $request)
    {
        if ($this->get_subscribed_msdn($request->msdn) === 1) {
            //Create Verification Code
            $verify = new SubscriberVerifier();
            $verify->subscriber_msdn = $request->msdn;
            $verify->verify_code = BergyUtils::verify_code();
            $verify->is_verified = false;

            $verify->save();

            //Send verification Code by SMS

            $data = array(
                'code' => 200,
                'message' => 'success',
                'url' => redirect()
                    ->route('jobs-details', [$request->job_id, BergyUtils::uuid()])
                    ->with('success', 'Your Subscription has been confirmed successfully '),
            );
            //Return response

        } else {
            $data = array(
                'code' => 401,
                'message' => 'not subscribed',
                'url' => redirect()->back()
                    ->with('error', 'No Subscription data was found for (' . $request->msdn . '), Please Subscribe'),
            );
        }
        //Session::flush();

        return $data['url'];

    }

    public function get_subscribed_msdn($msdn)
    {
        $is_subscribed = MSISDN::where('msisdn', '233' . $msdn)->count();
        if ($is_subscribed > 0) {
            return 1;
        }
        return 0;
    }

    public function browse_all_jobs()
    {
        $title = 'All Jobs';
        $jobs = Job::where('is_active', true)->paginate(10);

        if (Request::ajax()) {
            return view('subscriber.grids.all-jobs-grid', compact('jobs'));
        }

        return view('subscriber.pages.all-jobs', compact('title', 'jobs'));
    }

    public function test_email()
    {
       // Mail::to("mikebergafu@gmail.com")->send(new \App\Mail\SendEmailTest('hello'));
        dispatch(new SendApplicationEmail(
            [
                'applicant_email'=>'mikebergafu@yahoo.com',
                'poster_email'=>'mikebergafu@gmail.com',
                'job_name'=>'Secretary'
            ]
        ));
        //Mail::to('mikebergafu@gmail.com')->send(new ApplicationEmail('mikebergafu@gmail.com'));
       // $this->prepare_job('mikebergafu@gmail.com');
      /*  dispatch(
            new SendJobPostingAlert(
                $this->job('Mike-berg', 'mikebergafu@gmail.com', '233246102372')
            )
        );*/
    }

    protected function prepare_job($post_email)
    {

        dispatch(new SendApplicationEmail($post_email, $this->job_post('Mike-berg', 'mikebergafu@gmail.com', '233246102372')));

        //alert('Just to let you know', 'Job Notification Sent', 'info');
    }

    protected function job_poster($name, $email, $phone_number)
    {
        $this_poster = new Company();
        $this_poster->name = $name;
        $this_poster->email = $email;
        $this_poster->phone_number = $phone_number;

        return $this_poster;
    }

    protected function job_post($title, $description, $category_id)
    {
        $this_job = new Job();
        $this_job->title = $title;
        $this_job->description = $description;
        $this_job->category_id = $category_id;

        return $this_job;
    }
}
