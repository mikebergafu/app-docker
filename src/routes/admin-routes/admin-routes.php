<?php

use App\Helpers\BergyUtils as Bergy;
//Directory Name
Route::namespace('Admin')->group(function () {
    //Prefix Url with admin before any endpoint
    Route::prefix('admin')->group(function () {
        /*==========no authentication admin Routes Begin======*/
        Route::get('/', 'DashboardController@admin')->name('admin-admin');
        Route::get('/welcome', 'DashboardController@welcome')->name('admin-welcome');

        Route::get('/login', 'LoginController@create')->name('admin-login-form');
        Route::post('/process-login', 'LoginController@store')->name('admin-login');


        /*==========no authentication admin Routes Ends======*/
        //Check admin middleware or guard
        Route::middleware(['admin'])->group(function () {
            /*==========authentication admin Routes Begin======*/
            Route::get('/register/{uuid}', 'RegisterController@create')->name('admin-register-form');
            Route::get('/cm-register/{uuid}', 'RegisterController@create_content_manager')->name('cm-register-form');

            Route::get('/service-provider-register/{uuid}', 'RegisterController@create_ec_manager')->name('ec-register-form');

            Route::post('/process-registration', 'RegisterController@store')->name('admin-register');

            Route::get('/admin-dashboard/{uuid}', 'DashboardController@dashboard')->name('admin-dashboard');

            //Back off User Management
            Route::get('/admin-back-office-users/{uuid}', 'BackOfficeUserController@index')->name('admin-back-office-users');
            Route::get('/admin-all-users/{uuid}', 'UserController@index')->name('admin-all-users');

            Route::get('/admin-logs', 'LogController@index')->name('admin-log');

            Route::get('/admin-logout/{uuid}', 'LoginController@logout')->name('admin-logout');

            //Companies
            Route::get('/all-company/{uuid}', 'DashboardController@companies')->name('admin-list-company');
            Route::get('/add-company/{uuid}', 'DashboardController@create_company')->name('admin-add-company');
            Route::post('/store-company/{uuid}', 'DashboardController@store_company')->name('admin-store-company');


            /*==========authentication admin Routes Ends======*/

        });
    });

});
