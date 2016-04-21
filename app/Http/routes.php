<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','ReportController@index');
Route::resource('transactions','TransactionController');
Route::resource('user','UserController');
Route::resource('login','LoginController');

// Analytic controller
Route::get('analysis', 'AnalyticController@index');
Route::post('analysis', 'AnalyticController@index');
Route::get('transaction/concept/{id}',  [
    'as' => 'concept', 'uses' => 'TransactionController@concept'
]);