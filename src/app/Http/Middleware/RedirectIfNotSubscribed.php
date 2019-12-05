<?php

namespace App\Http\Middleware;

use App\Helpers\BergyUtils;
use App\Job;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='subscriber', Job $job)
    {
        if (BergyUtils::get_numbers_in_session() === 0) {
            return redirect()->route('send-confirm-sms-form',[BergyUtils::uuid(),$job->id ]);
        }
        //BergyUtils::downloadJSONFile(BergyUtils::get_numbers_in_session());
        return $next($request);
    }
}
