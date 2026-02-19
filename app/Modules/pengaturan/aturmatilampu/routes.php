<?php

Route::group(['middleware' => 'auth'], function(){

Route::controller('/pengaturan/aturmatilampu', 'App\Modules\pengaturan\aturmatilampu\Controllers\AturmatilampuController');

});