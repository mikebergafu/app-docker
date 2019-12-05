<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Helpers\BergyUtils;
use App\Http\Controllers\Subscriber\WelcomeController;
use App\MSISDN;
use App\SubscriberKeyword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeProcessController extends Controller
{

    public function subscribe_store_api(Request $request)
    {

        $title = 'Subscribe';
        //$results['categories'] = Category::where('is_active', true)->get();

        $phone = new MSISDN();
        $phone->subscriber_id = 1;
        $phone->msisdn = $request->msdn;
        $phone->network= 'mtn';

        $phone->save();

        //return $request;
        $wel = new WelcomeController();
        if ($wel->get_subscribed_msdn($request->msdn) === 1) {
            //Session::put('msdn', $request->msdn);

            $data = array(
                'code' => 200,
                'message' => 'success',
            );

        }else {
            $data = array(
                'code' => 401,
                'message' => 'failed',
            );
        }
        //Session::flush();

        return response()->json($data, $data['code']);

    }

    public function subscribe_to_keyword_api(Request $request)
    {
        $keyword = new SubscriberKeyword();
        $keyword->subscriber_id = 1;
        $keyword->category_id = 1;
        $keyword->save();

        //return $request;
        $wel = new WelcomeController();
        if ($wel->get_subscribed_msdn($request->msdn) === 1) {
            //Session::put('msdn', $request->msdn);
            $data = array(
                'code' => 200,
                'message' => 'success',
            );

        }else {
            $data = array(
                'code' => 401,
                'message' => 'failed',
            );
        }
        //Session::flush();

        return response()->json($data, $data['code']);

    }

    public function get_keywords($msdn){
        //return $request;
        $wel = new WelcomeController();

        if ($wel->get_subscribed_msdn($msdn) !== 1) {
            $data = array(
                'code' => 401,
                'message' => 'We can not verify your subscription',
                'data'=>null
            );

            return response()->json($data, $data['code']);
        }

        $result = array();

        $categories = Category::where('is_active', true)->select('id','name');

         foreach ($categories as $category){
             $result[]= $category->jobs;
         }

        if ($categories->count() > 0) {
            //Session::put('msdn', $request->msdn);
            $data = array(
                'code' => 200,
                'message' => 'success',
                'data'=> $result
            );
            return response()->json($data, $data['code']);
        }

        if ($categories->count() < 1) {
            $data = array(
                'code' => 201,
                'message' => 'No Keywords found',
                'data'=>null
            );
            return response()->json($data, 200);
        }

        $data = array(
            'code' => 200,
            'message' => 'failed',
            'data'=>null
        );

        return response()->json($data, $data['code']);
    }

    public function get_keyword_by_id(){

    }
}
