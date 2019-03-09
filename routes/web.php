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

Auth::routes();

Route::get('/', 'BookController@index')->name('home');
Route::get('/create', 'BookController@create')->name('books.create');
Route::post('/', 'BookController@store')->name('books.store');
Route::delete('/{book}', 'BookController@destroy')->name('books.destroy');
Route::get('/edit/{book}', 'BookController@edit')->name('books.edit');
Route::patch('/{book}', 'BookController@update')->name('books.update');
Route::patch('/status/{book}', 'BookController@status')->name('books.status');


Route::get('/category/create', 'CategoryController@create')->name('categories.create');
Route::post('/category', 'CategoryController@store')->name('categories.store');
