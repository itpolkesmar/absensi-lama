<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/harilibur', 'App\Modules\masterdata\harilibur\Controllers\HariliburController');

});