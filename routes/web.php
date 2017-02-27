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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/specializations/deleted', function (){
	return view ('specializations.deleted');
});
Route::get('/specializations/deleted', 'SpecializationController@deleted');
Route::post('/specialization/{id}/restore', 'SpecializationController@restore');
Route::delete('/specialization/{id}/delete', 'SpecializationController@destroy');
Route::resource('/users', 'UsersController');
Route::resource('/specializations', 'SpecializationController');
Route::resource('/roles', 'RolesController');
Route::resource('/permissions', 'PermissionsController');
Auth::routes();

Route::post('/users', 'UsersController@index');

