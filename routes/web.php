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
Auth::routes();
Route::get('/', function () {
    return view('accueil', ['name' => 'Muguiwara']);
});

Route::resource('sites', 'SiteController');
Route::get('/Relation/N:N', 'TestController@relation');


//Route::get('/locate', 'DeploiementController@index');

Route::middleware(['auth'])->group(function () {
    /*Route::get('/', function () {
        // Uses first & second Middleware
    });*/
    Route::resource('users', 'UserController');
	Route::get('deploiement', 'DeploiementController@index');
	Route::post('deploiement', 'DeploiementController@store');
	Route::get('deploiement-list', 'DeploiementController@list');
        // Uses first & second Middleware
});

        /*
        $colonne = "nom_site";
        $tri = "asc";
		*/

Route::get('items-list', 'ItemController@list');
Route::get('items', 'ItemController@index');
Route::get('items-list/{id}', 'ItemController@destroy');
Route::post('items/import', 'ItemController@import');
Route::get('items/export/{type}', 'ItemController@export');


Route::get('/home', 'HomeController@index')->name('home');
