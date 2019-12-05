<?php

namespace App\Helpers;

use App\AppliedJobs;
use App\Category;
use App\EducationalInstitution;
use App\EducationalLevel;
use App\Icon;
use App\Job;
use App\JobTitle;
use App\MSISDN;
use App\Skill;
use App\Subscriber;
use App\SubscriberSkill;
use App\SubscriberVerifier;
use App\VerificationCode;
use App\ViewedJobs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Khill\Lavacharts\Laravel\LavachartsFacade;
use Zttp\Zttp;

class BergyUtils
{

    public static function downloadJSONFile($my_data)
    {
        $data = json_encode($my_data);
        $fileName = time() . '_datafile.json';
        File::put(storage_path('/test_fol/' . $fileName), $data);
        $file_path = storage_path('/test_fol/' . $fileName);
        return Response::download($file_path);
    }

    public static function uuid()
    {
        $qtd = 50;
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;

        $Hash = NULL;
        for ($x = 1; $x <= $qtd; $x++) {
            $Posicao = rand(0, $QuantidadeCaracteres);
            $Hash .= substr($Caracteres, $Posicao, 1);
        }

        return $Hash;
    }

    public static function get_models()
    {
        $models = collect(get_declared_classes())->filter(function ($item) {
            return (substr($item, 0, 11) === 'App\Models\\');
        });

        return $models;
    }

    public static function generate_created_updated_by(Model $model, $guard_name)
    {
        $entity = new $model;
        $entity->created_by = Auth::guard($guard_name)->user()->id;
        $entity->updated_by = Auth::guard($guard_name)->user()->id;
        if ($guard_name == 'admin') {
            $entity->user_type = 1;
        } else if ($guard_name == 'content-manager') {
            $entity->user_type = 0;
        } else {
            $entity->user_type = 2;
        }

        return $entity;

    }

    public static function strWordCut($string, $length, $end = '...')
    {
        $string = strip_tags($string);

        if (strlen($string) > $length) {

            // truncate string
            $stringCut = substr($string, 0, $length);

            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . $end;
        }
        return $string;
    }

    public static function get_icons()
    {
        return Icon::all();
    }

    public static function get_category_name($category_id)
    {
        return Category::where('id', $category_id)->first()->name;
    }

    public static function check_subscribed($_no)
    {
        $mobile_no = $_no;
        $is_subscribed = DB::table('m_s_i_s_d_n_s')->where('msisdn', trim($mobile_no));

        if ($is_subscribed->count() > 0) {
            $is_subscribed_today = MSISDN::where([['msisdn', $mobile_no], ['is_subscribed', '1']]);
            if ($is_subscribed_today->count() > 0) {
                return 2;
            }
            return 1;
        }
        return 0;
    }

    public static function check_verify_sms($verify_code)
    {
        $tok = strtolower(substr($verify_code, -2));
        $ses = strtolower(substr(session()->getId(), -2));

        if ($tok !== $ses) {

            return 2;
        }

        $check_verify_code = VerificationCode::where('token', $verify_code)->count();
        if ($check_verify_code > 0) {

            return 1;
        }

        return 0;
    }

    public static function load_numbers_in_session()
    {
        if (env('SIMULATE_MSISDN') === true) {
            $data = array(env('TEST_MSISDN'));
            session()->put('msisdns', $data);
        } else {
            session()->forget('msisdns');
            //Session::flush();
        }
        $num = session()->get('msisdns');
        return $num[0];
    }

    public static function get_numbers_in_session()
    {
        $msdn = session('msdn');

        if ($msdn !== null) {
            return 1;
        }
        return 0;
    }

    public static function categories()
    {
        return Category::where('is_active', 1)->orderBy('name', 'asc')
            ->select('id', 'name')
            ->get();
    }

    public static function count_jobs_category($category_id)
    {
        return Job::where('category_id', $category_id)->count();
    }

    public static function count_all_jobs()
    {
        return Job::all()->count();
    }

    public static function get_job_subscribe_type_name($is_free)
    {
        $free = (int)$is_free;
        if ($free === 1) {
            return 'Free Content';
        }

        if ($free === 0) {
            return 'Premium Content';
        }

        return 'unknown: '.$is_free;
    }

    public static function verify_code()
    {
        $qtd = 4;
        $Caracteres = '0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;

        $Hash = NULL;
        for ($x = 1; $x <= $qtd; $x++) {
            $Posicao = rand(0, $QuantidadeCaracteres);
            $Hash .= substr($Caracteres, $Posicao, 1);
        }

        return $Hash . self::last_token();
    }

    protected static function last_token()
    {
        return strtolower(substr(session()->getId(), -2));
    }

    public static function zttpPOST($headers, $url, $payload)
    {
        return Zttp::withHeaders($headers)->post($url, $payload)->json();
    }

    public static function zttpGET($headers, $url, $payload)
    {
        return Zttp::withHeaders($headers)->get($url)->json();
    }

    public static function getHeaders()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $headers[str_replace(' ', '', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))))] = $value;
            }
        }
        return $headers;
    }

    function getCustomHeaders()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (preg_match("/^HTTP_X_/", $key))
                $headers[$key] = $value;
        }
        return $headers;
    }

    public static function columnChart()
    {
        //$lava = new Lavacharts; // See note below for Laravel
        $finances = LavachartsFacade::DataTable();

        $finances->addDateColumn('Year')
            ->addNumberColumn('Sales')
            ->addNumberColumn('Expenses')
            ->addNumberColumn('Net Worth')
            ->addRow(['2009-1-1', 1100, 490, 1324])
            ->addRow(['2010-1-1', 1000, 400, 1524])
            ->addRow(['2011-1-1', 1400, 450, 1351])
            ->addRow(['2012-1-1', 1250, 600, 1243])
            ->addRow(['2013-1-1', 1100, 550, 1462]);

        LavachartsFacade::ComboChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color' => 'rgb(123, 65, 89)',
                'fontSize' => 12,
            ],
            'legend' => [
                'position' => 'in',
            ],
            'seriesType' => 'bars',
            'series' => [
                2 => ['type' => 'line'],
            ],
            'height' => 300,
            'width' => 600,
        ]);

    }

    //Table to be used for subscriptions
    public static function getSubscribeStatus($subscriber_id)
    {
        $subscriber_msisdn = MSISDN::where('subscriber_id', $subscriber_id);
        if ($subscriber_msisdn->count() > 0) {
            return self::subStatusDesc($subscriber_msisdn->first()->is_subscribed);
            //Write data to session
            //1
        }

        return 0;
    }

    public static function subStatusDesc($is_subscribe_state)
    {
        if ($is_subscribe_state === 1) {
            return 'Subscribed';
        }
        return 'Not Subscribed';
    }

    public static function getJobTitles()
    {
        return JobTitle::all();
    }

    public static function getAboutJobTitle($id)
    {
        return JobTitle::where('id', $id)->first()->name;
    }

    public static function getEducationalLevels()
    {
        return EducationalLevel::all();
    }

    public static function getEducationalInstitutions()
    {
        return EducationalInstitution::all();
    }

    public static function getJobTitle($id)
    {
        return Job::where('id', $id)->first()->title;
    }

    public static function getJobAppliedCount($id)
    {
        return AppliedJobs::where('subscriber_id', $id)->count();
    }

    public static function getSkill($id)
    {
        return Skill::where('id', $id)->first()->name;
    }

    public static function getSkills()
    {
        return Skill::all();
    }

    public static function getSubsciberSkills()
    {
        return SubscriberSkill::where('subscriber_id', self::getSubcriberId(self::load_numbers_in_session()))->get();
    }

    public static function is_viewed($job_id)
    {
        $check = ViewedJobs::where([['job_id', $job_id], ['subscriber_id', self::getSubcriberId(self::load_numbers_in_session())]]);
        if ($check->count() > 0) {
            return 1;
        }
        return 0;
    }

    public static function unviewed_jobs_count()
    {
        $viewed = ViewedJobs::where('subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))->count();
        return self::count_all_jobs() - $viewed;

    }

    public static function unviewed_jobs()
    {
        /*ViewedJobs::where('subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))*/
        $unviewed = Job::leftJoin('viewed_jobs', 'jobs.id', '!=', 'viewed_jobs.job_id')
            ->where('viewed_jobs.subscriber_id', BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))
            ->leftJoin('categories', 'jobs.category_id', 'categories.id')
            ->select('jobs.id as id', 'jobs.title as title',
                'jobs.description as description', 'categories.id as category_id', 'categories.name', 'jobs.created_at')
            ->distinct()
            ->get();

        return $unviewed;
    }

    public static function getSubcriberId($isdn)
    {
        $id = MSISDN::where('msisdn', $isdn);

        if ($id->exists()) {
            return $id->first()->id;
        }
        return 0;
    }

    public static function checkSubscriptionStatus($mobile_number)
    {
        $id = MSISDN::where([['msisdn', $mobile_number], ['is_subscribed', 1]]);

        if ($id->exists()) {
            return true;
        }
        return 0;
    }

    public static function checkIfHasProfile($mobile_number)
    {
        $id = Subscriber::where([['phone_number', $mobile_number], ['first_name', true]]);

        if ($id->exists()) {
            return true;
        }
        return 0;
    }

    public static function getMsisdnFromHeader()
    {
        $my_msisdn = env('TEST_MSISDN');
        if ($my_msisdn !== null) {
            return 1;
        }
        //Possibly browsing on laptop or desktop
        return 0;
    }

    public static function add_to_msisdn($isdn){
        $sub = new MSISDN();
        $sub->msisdn = '233'.$isdn;
        $sub->network = 'mtn';
        $sub->password = Hash::make($isdn);
        $sub->is_active = true;
        $sub->is_blocked = false;
        $sub->is_subscribed = true;

        if(!$sub->save()){
            alert('Just to let you know','Unable to subscibe you. Please try again', 'danger');
            return redirect()->back();
        }
        alert('Just to let you know','You have been subscribed to JobDotGo Plus Services', 'success');
        return redirect()->back();
    }

    public static function write_isdn_to_session($isdn){
        session()->forget('isdn');
        session()->put('isdn', $isdn);
    }

    public static function getActualMsisdn()
    {
        $my_msisdn = env('TEST_MSISDN');
        if ($my_msisdn !== null) {
            return $my_msisdn;
        }
        //Possibly browsing on laptop or desktop
        return 0;
    }

    public static function getMsisdnID($msisdn){
        return MSISDN::where('msisdn', $msisdn)->first();
    }

}
