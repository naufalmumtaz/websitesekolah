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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index');
    
    Route::resource('/kelas', 'KelasController')->middleware('ceklevel:admin');
    Route::resource('/siswa', 'SiswaController')->middleware('ceklevel:admin');
});

// Route::get('/home', 'HomeController@index')->name('home');
