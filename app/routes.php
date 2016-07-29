<?php

/****************************************************************
 *  G U E S T S
 ****************************************************************/
Route::group(array('before' => 'guest'), function() {

    Route::get('/', ['as'=>'main', 'uses'=>'HomeController@index']);
    Route::get('/login', ['as'=>'login', 'uses'=>'AdminController@indexLogin']);
    Route::get('/news', ['as'=>'news', 'uses'=>'HomeController@indexNews']);
    Route::get('/schedules', ['as'=>'schedules', 'uses'=>'HomeController@indexSchedule']);

    // Node
    Route::get('/schedule/{id}', ['as'=>'js_schedule', 'uses'=>'HomeController@schedule_js']);
    Route::get('/news/refresh-js', ['as'=>'js_refreshNews', 'uses'=>'HomeController@js_refreshNews']);

    // --------------------------
    // CSRF protection group
    // --------------------------

    Route::group(array('before' => 'csrf'), function() {

        Route::post('/doLogin', ['as'=>'doLogin', 'uses'=>'AdminController@doLogin']);

    });

});

/****************************************************************
 *  A U T H E N T I C A T E D   U S E R S
 ****************************************************************/
Route::group(['before'=>'auth'],function(){

    Route::get('/admin/dashboard', ['as'=>'dashboard', 'uses'=>'AdminController@index']);

    Route::get('/admin/station/upsert', ['as'=>'upsertStation', 'uses'=>'AdminController@upsertStation']);
    Route::get('/admin/station/upsert/{id}', ['as'=>'upsertStation', 'uses'=>'AdminController@upsertStation']);

    Route::get('/admin/news', ['as'=>'manageNews', 'uses'=>'AdminController@indexNews']);
    Route::get('/admin/news/upsert/{id}', ['as'=>'upsertNews', 'uses'=>'AdminController@upsertNews']);

    Route::get('/admin/schedules', ['as'=>'manageSchedules', 'uses'=>'AdminController@indexSchedule']);
    Route::get('/admin/schedule/upsert/{id}/{stationId}', ['as'=>'upsertSchedule', 'uses'=>'AdminController@upsertSchedule']);

    Route::get('/logout', ['as'=>'logout', 'uses'=>'AdminController@logout']);

    Route::get('/admin/news/js', ['as'=>'js_news', 'uses'=>'AdminController@js_news']);
    Route::get('/admin/schedules/js', ['as'=>'js_schedules', 'uses'=>'AdminController@js_schedules']);

    // --------------------------
    // CSRF protection group
    // --------------------------

    Route::group(array('before' => 'csrf'), function() {
        Route::post('/admin/news/store', ['as'=>'storeNews', 'uses'=>'AdminController@storeNews']);
        Route::post('/admin/news/destroy', ['as'=>'destroyNews', 'uses'=>'AdminController@destroyNews']);

        Route::post('/admin/station/store', ['as'=>'storeStation', 'uses'=>'AdminController@storeStation']);
        Route::post('/admin/station/destroy', ['as'=>'destroyStation', 'uses'=>'AdminController@destroyStation']);

        Route::post('/admin/schedule/store', ['as'=>'storeSchedule', 'uses'=>'AdminController@storeSchedule']);
        Route::post('/admin/schedule/destroy', ['as'=>'destroySchedule', 'uses'=>'AdminController@destroySchedule']);
    });
});