<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/absensi/jadwalshift', 'App\Modules\absensi\jadwalshift\Controllers\JadwalshiftController');

});