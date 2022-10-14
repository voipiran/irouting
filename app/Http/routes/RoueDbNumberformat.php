<?php

use App\SettingDbNumberformatter;


Route::get('test', function () {
	return SettingDbNumberformatter::all();
});

Route::post('/number-format', 'DbNumberFormat@actions');

