<?php

namespace App\Http\Middleware;

use App\Helpers\BergyUtils;
use App\MSISDN;
use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RedirectIfNotSubscriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='subscriber')
    {
       //$my_msisdn = BergyUtils::load_numbers_in_session();
        $request->headers->set('MSISDN', env('TEST_MSISDN'));
        $my_msisdn = $request->header('MSISDN');

        $subscriber_msisdn = MSISDN::where('msisdn', $my_msisdn)->exists();

       /* if (!$subscriber_msisdn) {
            \alert('Just to let you know','Sorry! we cant identify your subscription status '.$my_msisdn,'info');
            return redirect()->route('subscriber-login-form',BergyUtils::uuid())->with('success',$my_msisdn);
        }*/


       /* if (!Auth::guard($guard)->check()) {
            \alert('Just to let you know','Welcome! you mobile no. is '.$my_msisdn,'info');
            return redirect()->route('subscriber-login-form',BergyUtils::uuid())->with('success',$my_msisdn);

        }*/

       /* if (!Auth::guard($guard)->check()) {
            \alert('Just to let you know','Welcome! you mobile no. is '.$header,'info');
            return redirect()->route('subscriber-login-form',BergyUtils::uuid())->with('success',$my_msisdn);

        }*/


     /*   if(BergyUtils::check_subscribed(Auth::guard($guard)->user()->phone_number) !== 2){
            Alert::alert('Just to Let you know!', 'Subscribe Now! to access more features with JobDoGoPlus', 'Info');
            if (session()->get('do_subscribe') === 1){
                return $next($request);
            }
            return redirect()->route('verify-subscribe-form', BergyUtils::uuid());
        }*/

        ///Alert::alert('Welcome!', 'JobDoGoPlus is your Partner in securing your future job ', 'Info');
        return $next($request);

    }


}
