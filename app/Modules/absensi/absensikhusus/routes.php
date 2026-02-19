<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/absensi/absensikhusus', 'App\Modules\absensi\absensikhusus\Controllers\AbsensikhususController');

});