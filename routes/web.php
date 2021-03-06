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
    flash('Welcome to the TASKMaster!')->info();
    return redirect('/crud');
});

Route::resource('crud', 'CRUDController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
