<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/users', 'UserController@all')->name('users.all');
Route::resource('users', 'UserController', ['except' => ['index', 'create', 'edit']]);

Route::get('/agencies', 'AgencyController@all')->name('agencies.all');
Route::resource('agencies', 'AgencyController', ['except' => ['index', 'create', 'edit']]);

Route::get('/properties', 'PropertyController@all')->name('properties.all');
Route::resource('properties', 'PropertyController', ['except' => ['index', 'create', 'edit']]);