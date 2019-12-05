<?php

use App\Helpers\BergyUtils as Bergy;

//Directory Name
Route::namespace('ECManager')->group(function () {
    //Prefix Url with admin before any endpoint
    Route::prefix('service-provider')->group(function () {
        /*==========no authentication admin Routes Begin======*/
        Route::get('/', 'DashboardController@ec_manager')->name('ecm-cm');
        Route::get('/welcome', 'DashboardController@welcome')->name('ecm-welcome');
        Route::get('/login', 'LoginController@create')->name('ecm-login-form');
        Route::post('/process-login', 'LoginController@store')->name('ecm-login');
        /*==========no authentication admin Routes Ends======*/

        //Check admin middleware or guard
        Route::middleware(['ec_manager'])->group(function () {
            /*==========authentication admin Routes Begin======*/
           /* Route::get('/register/{uuid}', 'RegisterController@create')->name('admin-register-form');
            Route::get('/cm-register/{uuid}', 'RegisterController@create_content_manager')->name('cm-register-form');

            Route::post('/process-registration', 'RegisterController@store')->name('admin-register');*/

            Route::get('/dashboard/{uuid}', 'DashboardController@dashboard')->name('ecm-dashboard');

            //Back off User Management
            Route::get('/clients-list/{uuid}', 'SubscriberController@index')->name('subscribers-list');

            Route::get('/logout/{uuid}', 'LoginController@logout')->name('ecm-logout');

            /*==========authentication admin Routes Ends======*/

        });
    });

});
