<?php

namespace App\Providers;

use App\Helpers\BergyUtils;
use App\Job;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       View::share('jobs', Job::where('is_active', true)->orderBy('title')->get());

        /*Blade::if('subscriber', function () {
            if (BergyUtils::get_numbers_in_session() === 0) {
                return redirect()->route('subscriber-send-msdn',BergyUtils::uuid());
            }
        });*/
    }
}
