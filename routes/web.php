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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/category/create', 'CategoryController@create')->name('category.create');
Route::post('/admin/category', 'CategoryController@store')->name('category.store');
Route::get('/admin/category', 'CategoryController@index')->name('category.index');
Route::delete('/admin/category/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::get('/admin/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('/admin/category/{id}t', 'CategoryController@update')->name('category.update');

Route::resource('/admin/post','PostController');