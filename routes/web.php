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

Route::get('/', function () {
    return view('accueil', ['name' => 'Muguiwara']);
});


Route::get('/test', 'TestController@index');


//Route::get('/locate', 'DeploiementController@index');

Route::get('deploiement', 'DeploiementController@index');
Route::post('deploiement', 'DeploiementController@store');
Route::get('deploiement-list', 'DeploiementController@list');

Route::get('items-list', 'ItemController@list');
Route::get('items', 'ItemController@index');
Route::get('items-list/{id}', 'ItemController@destroy');
Route::post('items/import', 'ItemController@import');
Route::get('items/export/{type}', 'ItemController@export');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
