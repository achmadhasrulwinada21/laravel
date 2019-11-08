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

 Route::prefix('sitemap')->group(function () {
    Route::get('/', function () {
        dd('This is the  module index page. Build something great!');
    });
    Route::resource('/tampil','SitemapController');
    Route::put('/edit/{id}', 'SiteheaderController@edit');
    Route::get('/json','SitemapController@json');   
    Route::post('/insert','SitemapController@insert');
    Route::post('/update/{id}','SitemapController@update');
    ROUTE::DELETE('/destroy/{id}', 'SitemapController@destroy');
    Route::get('/show/{id}','SitemapController@show'); 
    Route::post('/insert_detail','SitemapController@insert_detail');
    ROUTE::DELETE('/delete/{id}', 'SitemapController@delete');
    Route::post('/update_detail','SitemapController@update_detail');
});
