<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'locale'], function() {
    Route::get('lang/{lang}', 'LangController@changeLanguage')->name('lang');
});

// Books
Route::get('books', 'BookController@index')->name('book.index');
Route::get('books/{book}', 'BookController@detail')->name('book_detail');
Route::get('like/{book}', 'BookController@like')->name('like');
Route::get('unlike/{book}', 'BookController@unlike')->name('unlike');
Route::post('rate/{book}', 'BookController@rate')->name('rate');
Route::get('books/{category}/{id}', 'CategoryController@showByCategory')->name('show_by_category');

//Authors
Route::get('authors', 'AuthorController@index')->name('author.index');
Route::get('authors/{author}', 'AuthorController@detail')->name('author_detail');

//Borrowed book
Route::resource('requests', 'RequestController');
Route::get('request/{user}', 'RequestController@indexUser')->name('user.index');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('home', 'AdminController@index')->name('admin.home');
    Route::resource('publishers', 'PublisherController');
    Route::resource('authors', 'AuthorController');
    Route::resource('categories', 'CategoryController');
    Route::resource('books', 'BookController');
    Route::resource('users', 'UserController')->except([
        'create',
        'show',
        'edit',
    ]);
    Route::get('users/export', 'UserController@export')->name('admin.user_export');
    Route::get('requests', 'RequestController@index')->name('admin.request');
    Route::get('check/{id}', 'RequestController@check')->name('admin.check');
    Route::get('approve/{id}', 'RequestController@approve')->name('admin.approve');
    Route::get('reject/{id}', 'RequestController@reject')->name('admin.reject');
});
