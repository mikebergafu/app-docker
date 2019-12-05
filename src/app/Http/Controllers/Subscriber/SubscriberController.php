<?php

namespace App\Http\Controllers\Subscriber;

use App\Category;
use App\Helpers\BergyUtils;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeToNotifyRequest;
use App\Job;
use App\Jobs\SendApplicationEmail;
use App\Jobs\SendNotificationSignUpEmail;
use App\MSISDN;
use App\NotifySubscriber;
use App\Subscriber;
use App\SubscriberAbout;
use App\SubscriberFavourite;
use App\Unsubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as Req;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $all_categories = Category::where('is_active', true)->paginate(6);
        $my_categories = Category::leftJoin('subscriber_favourites', 'subscriber_favourites.category_id', 'categories.id')
            ->where([['favourite_type', 1], ['is_active', true], ['subscriber_favourites.subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session())]])
            ->select('categories.id as id', 'categories.name as name', 'categories.description as description')
            ->paginate(6);

        if (count($my_categories) > 0) {
            $categories = $my_categories;
        } else {
            $categories = $all_categories;
        }
        $jobs = Job::where('is_active', true)->paginate(10);

        if (Req::ajax()) {
            return view('subscriber.grids.categories-grid', compact('categories', 'jobs'));
        }
        return view('subscriber.pages.home', compact('title', 'categories', 'jobs'));
    }

    public function add_favourite($id, $type)
    {
        $sub_msisdn = BergyUtils::getActualMsisdn();
        $user_id = BergyUtils::getMsisdnID($sub_msisdn)->id;
        //Add 1 at a time.
        // if User adds a second 1, ask to add in multiple.
        $check_unique = SubscriberFavourite::where([
            ['category_id', $id],
            ['favourite_type', $type],
            ['subscriber_id', $user_id]])->count();

        //return $id."   ".$type."  ".$user_id."   ".$check_unique;

        if ($check_unique > 0) {
            $data = array(
                'code' => 304,
                'status' => 'failed',
                'message' => 'You have already added this to your favourites',
            );
            return response()->json($data, 200);
        }
        $fav = new SubscriberFavourite();
        if ($type === '1') {
            $fav->category_id = $id;
        }
        if ($type === '2') {
            $fav->job_id = $id;
        }
        $fav->subscriber_id = BergyUtils::getMsisdnID($sub_msisdn)->id;
        $fav->favourite_type = $type;

        if (!$fav->save()) {
            //alert()->error('Add to Favourites failed','Oops! Something went wrong');
            return response()->json(['status' => 'failed'], 500);
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        return view('subscriber.dashboard.pages.index', compact('title'));
    }

    public function apply_for_job($job_id)
    {
        return 'job applied';
    }

    public function profile()
    {

        $title = 'Profile';
        $about = SubscriberAbout::where([['is_active', true], ['subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session())]])->first();
        return view('subscriber.pages.profile.index', compact('title', 'about'));
    }

    public function get_all_categories()
    {
        $title = 'Categories';

        $categories = Category::where('is_active', true)->paginate(10);

        $jobs = Job::where('is_active', true)->paginate(10);

        if (Req::ajax()) {
            return view('subscriber.grids.categories-grid', compact('categories', 'jobs'));
        };

        return view('subscriber.pages.welcome', compact('title', 'categories', 'jobs'));
    }

    public function add_to_msisdn($isdn)
    {
        $isdn_exists = MSISDN::where('msisdn', $isdn)->exists();
        if ($isdn_exists) {
            DB::update('update m_s_i_s_d_n_s set is_subscribed = true where msisdn = ?', [$isdn]);
            alert('Just to let you know', 'You have been subscribed to JobDotGo Plus Services', 'success');
            return redirect()->back();
        }

        $sub = new MSISDN();
        $sub->msisdn = $isdn;
        $sub->network = 'mtn';
        $sub->password = Hash::make($isdn);
        $sub->is_active = true;
        $sub->is_blocked = false;
        $sub->is_subscribed = true;

        if (!$sub->save()) {
            alert('Just to let you know', 'Unable to subscibe you. Please try again', 'danger');
            return redirect()->back();
        }
        alert('Just to let you know', 'You have been subscribed to JobDotGo Plus Services', 'success');
        return redirect()->back();
    }

    public function subscribe_for_notification(SubscribeToNotifyRequest $request)
    {
        $validated = $request->validated();

        $notify = new NotifySubscriber();
        $notify->email = $request->email;
        $notify->is_active = true;

        if (!$notify->save()) {
            alert('Just to let you know!', 'Oops! we cant process you request, please try again', 'info');
            return redirect()->back();
        }

        dispatch(new SendNotificationSignUpEmail(
            [
                'email' => $notify->email,
                'message' => Config::get('jobplus.notify.email_subscribe_message'),
                'subject' => 'JobsDotGo Plus: Jobs Notification Subscription',
            ]
        ));

        alert('Just to let you know!', 'You have successfully Subscribed to JobsDotGo Plus', 'success');
        return redirect()->back();
    }

    public function unsubscriber_me($isdn){
       $unsub = MSISDN::where('msisdn', $isdn)->first();
        $msisdn = MSISDN::findOrFail($unsub->id);
        $msisdn->delete();

        $unsub_log = new Unsubscriber();
        $unsub_log->log = $msisdn;
        $unsub_log->save();
        alert('Just to let you know','You have Unsubscribed Successfully','info');
        return redirect()->route('subscriber-welcome');
    }

/*
developers@txtghana.com;
techmgmt@txtghana.com;
kingsley.amoatey@txtghana.com;
emmanuel.opoku@txtghana.com;
henry.kwao@txtghana.com;
nenekorle.korda@txtghana.com*/

}
