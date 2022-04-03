<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->middleware('auth')->name('index');
Route::get('/edit', 'ContacController@edit')->name('edit');
Route::post('/update', 'ContacController@update')->name('update');
Route::get('/add', 'ContacController@add')->name('add');
Route::get('/favorite', 'ContacController@favorite')->name('favorite');
Route::post('/add/new', 'ContacController@addNew')->name('addNew');
