<?php

use App\Helpers\BergyUtils as Bergy;

//Directory Name
Route::namespace('ContentManager')->group(function () {
    //Prefix Url with admin before any endpoint
    Route::prefix('content-manager')->group(function () {
        /*==========no authentication admin Routes Begin======*/
        Route::get('/', 'DashboardController@content_manager')->name('cm-cm');
        Route::get('/welcome', 'DashboardController@welcome')->name('cm-welcome');
        Route::get('/login', 'LoginController@create')->name('cm-login-form');
        Route::post('/process-login', 'LoginController@store')->name('cm-login');
        /*==========no authentication admin Routes Ends======*/

        //Check admin middleware or guard
        Route::middleware(['admin'])->group(function () {
            /*==========authentication admin Routes Begin======*/
           /* Route::get('/register/{uuid}', 'RegisterController@create')->name('admin-register-form');
            Route::get('/cm-register/{uuid}', 'RegisterController@create_content_manager')->name('cm-register-form');

            Route::post('/process-registration', 'RegisterController@store')->name('admin-register');*/

            Route::get('/content-dashboard/{uuid}', 'DashboardController@dashboard')->name('cm-dashboard');

            //Back off User Management
            Route::get('/clients-list/{uuid}', 'SubscriberController@index')->name('subscribers-list');

            Route::get('/admin-logout/{uuid}', 'LoginController@logout')->name('cm-logout');

            /*==========authentication admin Routes Ends======*/

        });
    });

});
