<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/absensi/inputmanual', 'App\Modules\absensi\inputmanual\Controllers\InputmanualController');

});