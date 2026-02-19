<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/masterdata/lokasimesin', 'App\Modules\masterdata\lokasimesin\Controllers\LokasimesinController');

});