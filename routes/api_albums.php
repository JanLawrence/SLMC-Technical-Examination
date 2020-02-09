<?php

use Illuminate\Http\Request;

// List albums
Route::get('albums', 'AlbumsController@index');

// List single albums
Route::get('albums/{id}', 'AlbumsController@show');

// Create new albums
Route::post('albums', 'AlbumsController@store');

// Update albums
Route::put('albums', 'AlbumsController@store');

// Delete albums
Route::delete('albums/{id}', 'AlbumsController@destroy');
