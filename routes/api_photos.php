<?php

use Illuminate\Http\Request;

// List photos
Route::get('photos', 'PhotosController@index');

// List single photos
Route::get('photos/{id}', 'PhotosController@show');

// Create new photos
Route::post('photos', 'PhotosController@store');

// Update photos
Route::put('photos', 'PhotosController@store');

// Delete photos
Route::delete('photos/{id}', 'PhotosController@destroy');
