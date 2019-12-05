<?php

namespace App\Http\Controllers\Subscriber;

use App\Helpers\BergyUtils;
use App\Helpers\NotificationUtils;
use App\Http\Controllers\Controller;
use App\MSISDN;
use App\SubscriberVerifier;
use App\VerificationCode;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    public function load_subscribe_form(){
        $title ='Verify & Subscribe';
        return view('subscriber.pages.subscribe.send-code-subscribe', compact('title'));
    }

    public function send_code(Request $request){

        //Create Verification Code
        $verify = new SubscriberVerifier();
        $verify->subscriber_msdn = '233'.(int)$request->msisdn;
        $verify->verify_code = BergyUtils::verify_code();
        $verify->is_verified = false;

        if(!$verify->save()){
            alert('Just wana let you know!','We cant you Verification code now','info');
            return redirect()->back();
        }
        $msg = 'Your Verification code is ' .$verify->verify_code.'. Please Enter it into the verified code field.';
        NotificationUtils::send_txt_gh_sms((int)$request->msisdn, $msg);

       return redirect()->route('verify-and-subscribe-form', BergyUtils::uuid());
    }

    public function verify_code_form(){
        $title ='Verify & Subscribe';

        return view('subscriber.pages.subscribe.subscribe', compact('title'));
    }

    public function verify_and_subscribe(Request $request){

        $is_valid = BergyUtils::check_verify_sms($request->verify_code);
        if($is_valid === 1){
            $this->do_subscribe($this->getMsisdnOnToken($request->verify_code));
            alert('We want to let you know','Code Successfully verified', 'success');
            return redirect()->route('subscriber-home', BergyUtils::uuid());
        }

        alert('We want to let you know','Oops! Invalid Code', 'danger');
        return redirect()->back();
    }

    public function verify_code($verify_code){

        $is_valid = BergyUtils::check_verify_sms($verify_code);
        if($is_valid === 1){
            $isdn = VerificationCode::where('token', $verify_code)->first()->msisdn;
            BergyUtils::write_isdn_to_session($isdn);
           return response()->json(['data'=>1],200);
        }

        return response()->json(['data'=>0],200);
    }

    protected function do_subscribe($mobile_no){
        $subscribe_status = BergyUtils::check_subscribed($mobile_no);
        if($subscribe_status === 0){
           $this->initSubscription($mobile_no) ;
        }

        $updata =array('is_subscribed' => true);

        DB::table('m_s_i_s_d_n_s')
            ->where('msisdn',$mobile_no)
            ->update($updata);
        alert('You can access JobsDotGo Plus Premium services now.','success');
        return redirect()->back();
    }

    protected function getMsisdnOnToken($verify_code){
       return SubscriberVerifier::where('verify_code', $verify_code)->first()->subscriber_msdn;
    }


    public function initSubscription($mobile_no){
        $msisdn = new MSISDN();
        $msisdn->subscriber_id = BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());
        $msisdn->msisdn =$mobile_no;
        $msisdn->network ='mtn';
        $msisdn->is_subscribed = 0;

        $msisdn->save();
    }

    public function notNow(){
        session()->put('do_subscribe', 1);
        return redirect()->route('subscriber-home', BergyUtils::uuid());
    }


}
