<?php

use Illuminate\Http\Request;

// List todos
Route::get('todos', 'TodosController@index');

// List single todos
Route::get('todos/{id}', 'TodosController@show');

// Create new todos
Route::post('todos', 'TodosController@store');

// Update todos
Route::put('todos', 'TodosController@store');

// Delete todos
Route::delete('todos/{id}', 'TodosController@destroy');
