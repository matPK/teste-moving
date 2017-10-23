<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index')->name('index');
Route::get('/imoveis', 'PagesController@indexProperties')->name('pages.properties.index');
Route::get('/imoveis/{id}', 'PagesController@getProperty')->name('pages.properties.get');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@getIndex')->name('admin.index');
    Route::get('imoveis', 'AdminController@indexProperties')->name('admin.properties');
    Route::get('agencias', 'AdminController@indexAgencies')->name('admin.agencies');
});
Auth::routes();