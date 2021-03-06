<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get( '/' ,'IndexController@main' )->name('home');

Route::get( '/blog/{uuid}','IndexController@detail' )->name('blog.detail');

Route::get( '/category/{uuid}', 'IndexController@category' )->name('category.lists');

Route::get( '/user/{uuid}', 'UserController@profile' )->name('user.profile');

Route::get( '/test', 'TestController@index' );