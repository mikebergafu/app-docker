<?php

use App\Helpers\BergyUtils as Bergy;

//Directory Name
Route::namespace('Common')->group(function () {
    //Prefix Url with admin before any endpoint
    Route::prefix('admin')->group(function () {
        /*==========no authentication admin Routes Begin======*/
        //No Route Defined here yet
        /*==========no authentication admin Routes Ends======*/
        //Check admin middleware or guard
        Route::middleware(['admin'])->group(function () {
            /*==========authentication admin Routes Begin======*/
            //Job Keywords
            Route::get('/job-categories/{uuid}', 'JobCategoryController@index')->name('admin-job-categories');
            Route::get('/job-categories/add-form/{uuid}', 'JobCategoryController@create')->name('admin-job-categories-form');
            Route::post('/job-categories/add-new/{uuid}', 'JobCategoryController@store')->name('admin-add-job-categories');
            Route::get('/job-categories/edit-form/{uuid}/{category}', 'JobCategoryController@edit')->name('admin-edit-job-categories-form');
            Route::post('/job-categories/update/{uuid}', 'JobCategoryController@update')->name('admin-update-job-categories');

            //Route::get('/cm-register/{uuid}', 'RegisterController@create_content_manager')->name('cm-register-form');

            //Job
            Route::get('/jobs/{uuid}', 'JobController@index')->name('admin-jobs');
            Route::get('/jobs/add-form/{uuid}', 'JobController@create')->name('admin-jobs-form');
            Route::post('/jobs/add-new/{uuid}', 'JobController@store')->name('admin-add-jobs');
            Route::get('/jobs/edit-form/{uuid}/{job}', 'JobController@edit')->name('admin-edit-jobs');
            Route::post('/jobs/update/{uuid}', 'JobController@update')->name('admin-update-jobs');

            Route::get('/jobs/add-form-with-poster/{company}/{uuid}', 'JobController@create_with_poster')->name('admin-jobs-form-with-poster');
            Route::post('/jobs/add-new-with-poster/{uuid}', 'JobController@store_with_poster')->name('admin-add-jobs-with-poster');

            Route::get('/jobs-by-categories/{category_id}/{uuid}', 'JobController@jobs_by_category')->name('jobs-by-categories');

            /*==========authentication admin Routes Ends======*/

        });
    });
//Helper Routes

    Route::middleware('subscriber')->group(function () {
        /*==========authentication admin Routes Begin======*/
        Route::get('/get-job-category/{category_id}', 'JobPlusHelperController@get_category_name')->name('helpers-job-category');
        Route::get('/send-sms/{msisdn}/{message}', 'JobPlusHelperController@send_sms')->name('helpers-send-sms');
        Route::get('/save-verify-sms/{token}/{msisdn}', 'JobPlusHelperController@save_verification')->name('helpers-save-sms');
        Route::get('/get-verify-token/', 'JobPlusHelperController@get_verify_token')->name('helpers-verify-token');
        Route::get('/jobs-details/{job}/{uuid}', 'JobController@job_details')->name('jobs-details');
       // Route::get('/jobs-details/{job}/{uuid}', 'JobController@job_details')->name('jobs-details');

        //Job Keywords
        Route::get('/job-categories/{uuid}', 'JobCategoryController@index')->name('subscriber-job-categories');
        //Route::get('/cm-register/{uuid}', 'RegisterController@create_content_manager')->name('cm-register-form');
        //Job
        Route::get('/jobs/{uuid}', 'JobController@index')->name('subscriber-jobs');

        Route::get('/jobs-by-categories/{category}/{uuid}', 'JobController@jobs_by_category')->name('jobs-by-categories');
        Route::post('/jobs-by-categories-search/{uuid}', 'JobController@jobs_by_category_post')->name('jobs-by-categories-search');

        /*==========authentication admin Routes Ends======*/

    });

});
