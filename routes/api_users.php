<?php

use Illuminate\Http\Request;

// List users
Route::get('users', 'UsersController@index');

// List single users
Route::get('users/{id}', 'UsersController@show');

// Create new users
Route::post('users', 'UsersController@store');

// Update users
Route::put('users', 'UsersController@store');

// Delete users
Route::delete('users/{id}', 'UsersController@destroy');
