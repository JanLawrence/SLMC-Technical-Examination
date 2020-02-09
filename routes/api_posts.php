<?php

use Illuminate\Http\Request;

// List posts
Route::get('posts', 'PostsController@index');

// List single posts
Route::get('posts/{id}', 'PostsController@show');

// Create new posts
Route::post('posts', 'PostsController@store');

// Update posts
Route::put('posts', 'PostsController@store');

// Delete posts
Route::delete('posts/{id}', 'PostsController@destroy');
