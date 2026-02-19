<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/unit', 'App\Modules\masterdata\unit\Controllers\UnitController');

});