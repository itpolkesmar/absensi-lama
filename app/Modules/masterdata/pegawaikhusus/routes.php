<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/pegawaikhusus', 'App\Modules\masterdata\pegawaikhusus\Controllers\PegawaikhususController');

});