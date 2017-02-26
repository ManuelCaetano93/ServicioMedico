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
Route::resource('/users', 'UsersController');
Route::resource('/roles', 'RolesController');
Route::resource('/permissions', 'PermissionsController');
Route::put('/roles/{id}/asignpermissions','RolesController@asignpermissions');
Route::put('/users/{id}/asignpermissions','UsersController@asignpermissions');


Auth::routes();

Route::post('/users', 'UsersController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
