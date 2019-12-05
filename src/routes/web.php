<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Events\Subscribed;
use App\Mail\SendSubscriptionConfirmEmail;
use Gallib\ShortUrl\Facades\ShortUrl;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Khill\Lavacharts\Laravel\LavachartsFacade;

header("Cache-Control: no-cache, must-revalidate");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::namespace('Subscriber')->group(function () {

    Route::get('/send-verification-sms', function (){
        //Mail::to('mikebergafu@gmail.com')->send(new SendSubscriptionConfirmEmail());
        \App\Helpers\NotificationUtils::send_txt_gh_sms('246102372','Hello');
        /*$agent = new Agent();
        $platform = $agent->platform();
        //\App\Helpers\BergyUtils::downloadJSONFile(\App\Helpers\BergyUtils::getHeaders());
        return \App\Helpers\JSUtils::jsPrompt('How old?' );*/
    });

    Route::get('/', 'WelcomeController@index')->name('subscriber-welcome');
    Route::get('/login/{uuid}', 'AuthController@login')->name('subscriber-login-form');
    Route::post('/process-login/{uuid}', 'AuthController@process_login')->name('subscriber-login');

    Route::get('/sign-up/{uuid}', 'AuthController@register')->name('subscriber-signup-form');
    Route::post('/process-sign-up/{uuid}', 'AuthController@process_register')->name('subscriber-signup');

    //Verifications
    Route::get('/send-verification-subscribe-form/{uuid}', 'VerificationController@load_subscribe_form')->name('verify-subscribe-form');
    Route::post('/send-code/{uuid}', 'VerificationController@send_code')->name('send-verify-subscribe');
    Route::get('/verify-and-subscribe-form/{uuid}', 'VerificationController@verify_code_form')->name('verify-and-subscribe-form');
    Route::post('/verify-and-subscribe/{uuid}', 'VerificationController@verify_and_subscribe')->name('verify-and-subscribe');

    Route::get('/subscribe-not-now/{uuid}', 'VerificationController@notNow')->name('subscribe-not-now');

    //Check Subscriber middleware or guard
    Route::middleware(['subscriber'])->group(function () {
        /*==========authentication Subscriber Routes Begin======*/
        //
        Route::get('/send-msdn/{job_id}/{uuid}', 'WelcomeController@send_msdn')->name('subscriber-send-msdn');
        Route::post('/confirm-msdn/{uuid}', 'WelcomeController@confirm_msdn')->name('subscriber-confirm-msdn');

        //
        Route::get('/subscribe-msdn-form/{job_id}/{uuid}', 'WelcomeController@subscribe_form')->name('subscribe-msdn-form');
        Route::post('/subscribe-msdn/{uuid}', 'WelcomeController@subscribe_store')->name('subscribe-msdn');

        //Confirm Code
        Route::get('/send-verification-code-form/{job_id}/{uuid}', 'WelcomeController@send_confirm_sms_form')->name('send-confirm-sms-form');
        Route::post('/send-verification-code-form/{uuid}', 'WelcomeController@send_confirm_sms')->name('send-confirm-sms');


        Route::get('/browse-jobs/{uuid}', 'WelcomeController@browse_all_jobs')->name('browse-all-jobs');

        //================
        Route::get('/my-home/{uuid}', 'SubscriberController@index')->name('subscriber-home');
        Route::get('/logout/{uuid}', 'AuthController@logout')->name('subscriber-logout');
        Route::get('/dashboard/{uuid}', 'SubscriberController@dashboard')->name('subscriber-dashboard');
        Route::get('/profile/{uuid}', 'SubscriberController@profile')->name('subscriber-profile');

        //Unsubscribe
        Route::get('/unsub/{isdn}', 'SubscriberController@unsubscriber_me')->name('subscriber-unsubscribe');

        Route::post('/update-profile-about', 'UpdateSubscriberProfileController@updateAbout')->name('subscriber-profile-update-about');
        Route::post('/update-profile-education', 'UpdateSubscriberProfileController@editEducation')
            ->name('subscriber-profile-update-education');


        //Jobs Activities
        Route::get('/add-to-favourite/{id}/{type}', 'SubscriberController@add_favourite')->name('subscriber-add-fav');
        Route::get('/view-all-categories', 'SubscriberController@get_all_categories')->name('subscriber-all-categories');
        Route::get('/apply-for-job/{id}', 'JobApplicationController@apply_job')->name('subscriber-apply-job');

        Route::post('/add-skills', 'JobApplicationController@add_skill')->name('subscriber-add-skill');
        Route::get('/skills', 'JobApplicationController@skills')->name('subscriber-skills');

        //Educational
        Route::post('/add-education', 'JobApplicationController@add_education')->name('subscriber-add-education');

        //Dasboard
        Route::get('/my-applied-jobs', 'DashboardController@applied_jobs_list')->name('subscriber-applied-jobs');
        Route::get('/my-settings/{uuid}', 'DashboardController@settings')->name('subscriber-settings');

        Route::get('/unsub-me/{uuid}', 'DashboardController@subscribe_me')->name('subscriber-unsub');

        //Secondary Contents
        Route::get('/aux-content/{uuid}', 'SecondaryContentController@index')->name('subscriber-aux-content-index');

        Route::get('/send-email', 'WelcomeController@test_email')->name('subscriber-test-email');

        Route::get('/do_subscribe/{msisdn}', 'SubscriberController@add_to_msisdn')->name('subscriber-do-subscribe');

        Route::get('/verify-new-code/{code}', 'VerificationController@verify_code')->name('subscriber-verify-code');

        Route::post('/subscribe-to-jobs', 'SubscriberController@subscribe_for_notification')->name('subscribe-to-jobs');

        //Route::get('/add-favourite-job/{}', 'SubscriberController@add_favourite')->name('subscriber-fav-job');
        /*==========authentication Subscriber Routes Ends======*/

    });
});


include('admin-routes/admin-routes.php');
include('content-manager-routes/cm-routes.php');
include('common-routes/common-routes.php');
include('ec-manager-routes/ecm-routes.php');
//ShortUrl::routes();
