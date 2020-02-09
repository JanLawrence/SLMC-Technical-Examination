<?php

use Illuminate\Http\Request;

// List comments
Route::get('comments', 'CommentsController@index');

// List single comments
Route::get('comments/{id}', 'CommentsController@show');

// Create new comments
Route::post('comments', 'CommentsController@store');

// Update comments
Route::put('comments', 'CommentsController@store');

// Delete comments
Route::delete('comments/{id}', 'CommentsController@destroy');
