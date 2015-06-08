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

// Route::resource('/numbers', 'NumberController');
Route::post('/numbers', ['middleware' => 'filterNumber', 'uses' => 'NumberController@store']);
Route::put('/numbers/{id}', ['middleware' => 'filterNumber', 'uses' => 'NumberController@update']);

Route::post('/users/{id}/numbers', ['middleware' => 'filterNumber', 'uses' => 'UserController@addNumber']);
Route::delete('/users/{id}/numbers/{numberId}', 'UserController@removeNumber');

Route::post('/locations/{id}/numbers', ['middleware' => 'filterNumber', 'uses' => 'LocationController@addNumber']);
Route::delete('/locations/{id}/numbers/{numberId}', 'LocationController@removeNumber');
