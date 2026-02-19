<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/absensi/rekapabsensi', 'App\Modules\absensi\rekapabsensi\Controllers\RekapabsensiController');

});