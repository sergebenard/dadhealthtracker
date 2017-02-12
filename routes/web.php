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

Route::get('/', 'ActivitiesController@home' );

Route::get('/input', 'ActivitiesController@inputForm');

Route::post('/input', 'ActivitiesController@addInput');

Route::get('/input/today', 'ActivitiesController@inputToday');

Route::get('/output/today', 'ActivitiesController@outputToday');

Route::get('/bp/today', 'ActivitiesController@bpToday');

Route::get('/activities/today', 'ActivitiesController@allToday');

Route::get('/output', 'ActivitiesController@outputForm');

Route::post('/output', 'ActivitiesController@addOutput');

Route::post('/bp', 'ActivitiesController@addBp');

Route::get('/bp', 'ActivitiesController@bpForm');

Route::get('/edit/{activity}', 'ActivitiesController@editForm');

Route::patch('/edit/{activity}', 'ActivitiesController@update');

Route::get('activities', 'ActivitiesController@activities');

Route::get('activities/delete/{activity}', 'ActivitiesController@removeFromToday');

Route::get('activities/{type}', 'ActivitiesController@type' );

Route::get('activity/{activity}', 'ActivitiesController@activity' );

Route::get('activity/delete/{activity}', 'ActivitiesController@remove');