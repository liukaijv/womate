<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/about/{id?}', 'HomeController@about')->name('about');

Route::get('/posts/{id?}', 'HomeController@posts')->name('posts');

Route::get('/post/{id}', 'HomeController@post')->name('post');

Route::get('/products/{id?}', 'HomeController@products')->name('products');

Route::get('/product/{id}', 'HomeController@product')->name('product');

Route::get('/recruit', 'HomeController@recruit')->name('recruit');

Route::post('/feedback', 'HomeController@feedback')->name('feedback');
