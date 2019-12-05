<?php

namespace App\Helpers;

class NotificationUtils
{

    public static function send_txt_gh_sms($recipient_mobile_no, $message, $sender = 'jobplus')
    {
        $url = 'http://62.129.149.54:808/rest-apis/v1/sendSMS/single';

        $headers = array(
            'Content-Type' => 'application/json',
        );

        $payload = array(
            'recipient' => '233'.$recipient_mobile_no,
            'message' => $message,
            'sender' => $sender,
        );

        return BergyUtils::zttpPOST($headers, $url, $payload);
    }

}
