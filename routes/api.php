<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Welcome, all of the api for this technical test is available here
|
|
*/


Route::get('/users', 'UserController@index');
// POST /api/users for create new user
Route::post('/users', 'UserController@store');

// POST /api/users/update-role for updating user role;
Route::post('/users/update-role', 'UserController@updateRole');

// GET /api/roles for displaying all roles
Route::get('/roles', 'RoleController@index');
// POST /api/roles for create new role
Route::post('/roles', 'RoleController@store');
