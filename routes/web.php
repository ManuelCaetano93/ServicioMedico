
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

// Users Routes

Route::resource('/users', 'UsersController');

Route::get('/users/{id}/associate', 'UsersController@associate');
Route::put('/users/{id}/associatespecialization', 'SpecializationsUserController@associatespecialization');


// Specialization Routes

Route::get('/specializations/deleted', 'SpecializationController@deleted');
Route::post('/specialization/{id}/restore', 'SpecializationController@restore');
Route::delete('/specialization/{id}/delete', 'SpecializationController@destroy');
Route::resource('/specializations', 'SpecializationController');

// Appointments Routes

Route::get('/appointments/deleted', 'AppointmentsController@deleted');
Route::post('/appointments/{id}/restore', 'AppointmentsController@restore');
Route::delete('/appointments/{id}/delete', 'AppointmentsController@destroy');
Route::resource('/appointments', 'AppointmentsController');
Route::get('users/{id}/appointment', 'AppointmentsController@createappointment');
route::post('appointments/{id}/create', 'AppointmentsController@store');

// Permissions Routes

Route::resource('/permissions', 'PermissionsController');

// Recipes Routes

Route::resource('/recipes', 'RecipesController');

// Roles Routes

Route::resource('/roles', 'RolesController');
Route::get('/roles/{id}/assignpermissions','RolesController@permissions');
Route::put('/roles/{id}/assignpermissions','RolesController@assignpermissions');

//Medicines Routes

Route::get('/medicines/deleted', 'MedicinesController@deleted');
Route::post('/medicines/{id}/restore', 'MedicinesController@restore');
Route::resource('/medicines', 'MedicinesController');

// Records Routes

Route::get('/records/{id}/create', 'RecordsController@create');
Route::post('/records/{id}/create', 'RecordsController@store');
Route::resource('/records', 'RecordsController');




Auth::routes();
Route::post('/users', 'UsersController@index');
