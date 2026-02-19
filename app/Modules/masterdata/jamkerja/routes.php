<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/jamkerja', 'App\Modules\masterdata\jamkerja\Controllers\JamkerjaController');

});