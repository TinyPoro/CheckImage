<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home?type=app_giai_ngay&team=team1', 'HomeController@index')->name('home1');
Route::get('/report', 'HomeController@report')->name('report');
Route::get('/report/summary', 'HomeController@reportSummary')->name('report_summary');

Route::post('/post', 'HomeController@post')->name('post');
Route::get('/cur_check', 'HomeController@getCheckNumber')->name('cur_check');

/** SOCIALIZE LOGIN */
Route::group(['prefix' => 'app'], function () {
    Route::get('{provider}/login','SocialiteAuthController@redirectToProvider')->name('social.login');;
    Route::get('{provider}/callback', 'SocialiteAuthController@handleProviderCallback');
});