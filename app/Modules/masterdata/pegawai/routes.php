<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/pegawai', 'App\Modules\masterdata\pegawai\Controllers\PegawaiController');

});