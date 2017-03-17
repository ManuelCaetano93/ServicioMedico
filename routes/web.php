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

//Route::group(['middleware' => ['roles:Admin']], function () {

// Users Routes

Route::resource('/users', 'UsersController');
Route::get('/users/{id}/permissions', 'UsersController@permissions');
Route::put('/users/{id}/permissions', 'UsersController@asignpermissions');
Route::get('/users/{id}/associate', 'UsersController@associate');
Route::put('/users/{id}/associatespecialization', 'SpecializationsUserController@associatespecialization');


// Specialization Routes
Route::resource('/specializations', 'SpecializationController');
Route::get('/specialization/deleted', 'SpecializationController@deleted');
Route::post('/specialization/{id}/restore', 'SpecializationController@restore');
Route::delete('/specialization/{id}/delete', 'SpecializationController@destroy');
Route::resource('/specializations', 'SpecializationController');


// Appointments Routes
Route::resource('/appointments', 'AppointmentsController');
Route::get('/appointment/deleted', 'AppointmentsController@deleted');
Route::post('/appointments/{id}/restore', 'AppointmentsController@restore');
Route::delete('/appointments/{id}/delete', 'AppointmentsController@destroy');
Route::get('users/{id}/appointment', 'AppointmentsController@createappointment');
route::post('appointments/{id}/create', 'AppointmentsController@store');

// Permissions Routes
Route::resource('/permissions', 'PermissionsController');

// Recipes Routes

Route::resource('/recipes', 'RecipesController');
Route::match(array('PUT', 'PATCH'), "/recipes/{id}/receive", array(
    'uses' => 'RecipesController@receive',
    'as' => 'recipes.receive'
));

// Roles Routes
Route::resource('/roles', 'RolesController');
Route::get('/roles/{id}/assignpermissions', 'RolesController@permissions');
Route::put('/roles/{id}/assignpermissions', 'RolesController@assignpermissions');

//Medicines Routes

Route::get('/medicines/{id}/asignpermissions', 'MedicinesController@permissions');
Route::put('/medicines/{id}/asignpermissions', 'MedicinesController@asignpermissions');
Route::get('/medicines/deleted', 'MedicinesController@deleted');
Route::post('/medicines/{id}/restore', 'MedicinesController@restore');
Route::resource('/medicines', 'MedicinesController');

// Records Routes

Route::get('/records/{id}/create', 'RecordsController@create');
Route::post('/records/{id}/create', 'RecordsController@store');
Route::resource('/records', 'RecordsController');

Auth::routes();


