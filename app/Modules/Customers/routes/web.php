<?php

/*
|--------------------------------------------------------------------------
| Customers Module Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Modules\Customers\Http\Controllers'], function() {
    Route::group(['prefix' => 'backend', 'namespace'=>'BackEnd'], function() {
        Route::get('customers', 'Customers@index');
    });

    Route::group(['prefix' => 'frontend', 'namespace'=>'FrontEnd'], function() {
        Route::get('customers', 'Customers@index');
    });
});