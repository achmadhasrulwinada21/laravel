<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

 Route::prefix('banner')->group(function () {
    Route::get('/', function () {
        dd('This is the Banner module index page. Build something great!');
    });
    Route::resource('/tampil','MbannerController');
    Route::get('/json','MbannerController@json'); 
    Route::post('/insert','MbannerController@insert');
    Route::post('/update/{id}','MbannerController@update');
    ROUTE::DELETE('/destroy/{id}', 'MbannerController@destroy');
});
