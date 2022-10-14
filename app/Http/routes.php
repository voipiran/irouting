<?php

use App\Http\Controllers\Setting_Controller;
use App\Http\Requests\Request;
use App\Setting_;
use App\SettingDbNumberformatter;
use App\User;


Route::get('/', 'HomeController@index')->middleware('licence');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('licence');;

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('/uploads', 'Setting_Controller@uploads')->middleware('licence');

Route::post('/settings/action', 'Setting_Controller@actions')->middleware('licence');
