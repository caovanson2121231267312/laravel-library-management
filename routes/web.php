<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::resource('publishers', 'PublisherController');
    Route::resource('authors', 'AuthorController');
    Route::resource('categories', 'CategoryController');
    Route::resource('books', 'BookController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
