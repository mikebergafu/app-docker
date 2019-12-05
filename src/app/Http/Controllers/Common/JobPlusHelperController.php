<?php

namespace App\Http\Controllers\Common;

use App\Category;
use App\Helpers\BergyUtils;
use App\Helpers\NotificationUtils;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Subscriber\WelcomeController;
use App\VerificationCode;

class JobPlusHelperController extends Controller
{
    public function get_category_name($id)
    {
        return Category::where([['id', $id], ['is_active', true]])->first();
    }

    public function send_sms($msisdn, $msg)
    {
        $welcome = new WelcomeController();
        if ($welcome->get_subscribed_msdn($msisdn) === 1) {
            return NotificationUtils::send_txt_gh_sms($msisdn, $msg);
        }

        if ($welcome->get_subscribed_msdn($msisdn) !== 1) {
            $msg = 'You\'re currently not subscribed, please click this link: http://bit.ly/33qsys2 to sign up and subscribe';
            alert()->info('Subscriber', 'Not Subscribed. Please check your SMS to subscriber Now!');
            return NotificationUtils::send_txt_gh_sms($msisdn, $msg);
        }
        return response()->json(['code' => 200, 'status' => 'success'], 200);
    }

    public function save_verification($token, $msidn)
    {
        $verify = new VerificationCode();
        $verify->session_id = session()->getId();
        $verify->msisdn = $msidn;
        $verify->token = $token;

        $verify->save();
    }

    public function get_verify_token()
    {
        $data = array(
            'code' => BergyUtils::verify_code(),
        );

        return response()->json($data, 200);
    }

    public function check_subscription($mobile_number)
    {
        //if mobile phone, get the mobile number and auto login the user.
        //If desktop, send user to login page
        BergyUtils::check_subscribed($mobile_number);
        //if logged in, check if subscribed
    }

}
