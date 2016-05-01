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


Route::get(trans('routes.home'),'ReportController@index');
Route::resource(trans('routes.transactions'),'TransactionController');
Route::resource(trans('routes.user'),'UserController');
Route::resource(trans('routes.login'),'LoginController');
Route::get('logout', 'LoginController@logout');

// Analytic controller
Route::get(trans('routes.analysis'), 'AnalyticController@index');
Route::post(trans('routes.analysis'), 'AnalyticController@index');
Route::get(trans('routes.concept'),'TransactionController@concept')->name('concept');
Route::get(trans('routes.notice'),'TransactionController@notice')->name('notice');
Route::get(trans('routes.transactionByDate'),'TransactionController@byDate')->name('byDate');