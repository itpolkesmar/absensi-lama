<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/jatahcuti', 'App\Modules\masterdata\jatahcuti\Controllers\JatahcutiController');

});