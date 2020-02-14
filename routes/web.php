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
Route::get('/import','GoogleCalendarController@import')->name('import');
Route::get('/auth/{service}', 'OAuthLoginController@getGoogleAuth')->where('service', 'google');
Route::get('/auth/callback/google', 'OAuthLoginController@authGoogleCallback');

Route::prefix('api')->group(function() {
    Route::get('/events','GoogleCalendarController@getEvents');
    Route::get('/task/{project_id}','TaskController@getTask');
});
Route::resource('project', 'ProjectController');
Route::resource('task', 'TaskController');
Route::resource('calendar', 'GoogleCalendarController');
