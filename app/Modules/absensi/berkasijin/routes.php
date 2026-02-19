<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/absensi/berkasijin', 'App\Modules\absensi\berkasijin\Controllers\BerkasijinController');

});