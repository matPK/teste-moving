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

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', 'AdminController@getIndex')->name('admin.index');
        Route::prefix('imoveis')->group(function () {
            Route::get('/', 'AdminController@indexProperties')->name('admin.properties.index');
            Route::get('novo', 'AdminController@createProperty')->name('admin.properties.create');
            Route::get('{id}/editar', 'AdminController@editProperty')->name('admin.properties.edit');
        });
        Route::prefix('agencias')->group(function () {
            Route::get('/', 'AdminController@indexAgencies')->name('admin.agencies.index');
            Route::get('novo', 'AdminController@createAgency')->name('admin.agencies.create');
            Route::get('{id}/editar', 'AdminController@editAgency')->name('admin.agencies.edit');
        });
    });
});
Auth::routes();