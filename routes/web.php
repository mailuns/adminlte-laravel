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

Route::group(['middleware' => ['auth']], function(){
	Route::get('/register', function() {
        return view('auth.register');
    })->name('register');
    Route::get('/', function () {
        return view('layouts.admin_template');
    });
});



Route::group(['middleware' => ['auth'], 'prefix' => 'event'], function(){
    Route::get('/list', 'LogEventController@index');
    Route::get('/edit/{id}', 'LogEventController@edit');
    Route::put('/update/{id}', 'LogEventController@update');

});




/* Route::group(['middleware' => ['auth'], 'prefix' => 'pulau'], function(){
    Route::get('/list', 'PulauController@index')->name('pulau.index');
    Route::get('/add', 'PulauController@add');
    Route::post('/store', 'PulauController@store');
    Route::get('/edit/{id}', 'PulauController@edit');
    Route::put('/update/{id}', 'PulauController@update');
    Route::get('/delete/{id}', 'PulauController@delete');
});

 */

Route::get('/home', 'HomeController@index')->name('home');
