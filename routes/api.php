<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/categories')->group(function() {
    Route::post('new_category', 'CategoryController@store');
    Route::get('find', 'CategoryController@index');
    Route::get('find_category/{id}', 'CategoryController@show');
    Route::post('update_category/{id}', 'CategoryController@update');
    Route::delete('delete_category/{id}', 'CategoryController@destroy');
});

Route::prefix('/posts')->group(function() {
    Route::get('activity/{id}', 'PostController@post_activity');
});