<?php

use App\Http\Controllers\Setting_Controller;
use App\Http\Requests\Request;
use App\Setting_;
use App\SettingDbNumberformatter;
use App\User;


Route::get('/', 'HomeController@index');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');;

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('/uploads', 'Setting_Controller@uploads');

Route::post('/settings/action', 'Setting_Controller@actions');


