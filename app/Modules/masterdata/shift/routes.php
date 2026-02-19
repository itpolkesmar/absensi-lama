<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/shift', 'App\Modules\masterdata\shift\Controllers\ShiftController');

});