<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/absensi/logabsensi', 'App\Modules\absensi\logabsensi\Controllers\LogabsensiController');

});