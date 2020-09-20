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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'karyawan',
    'namespace' => 'Karyawan\\',
    'as' => 'karyawan.'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/', 'HomeController@post')->name('home.post');
});

/**
 * Admin
 */
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin\\',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/slip-gaji', 'SlipGajiController@index')->name('slip-gaji');
    Route::post('/slip-gaji', 'SlipGajiController@post')->name('slip-gaji.post');
    Route::delete('/slip-gaji/destroy', 'SlipGajiController@destroy')->name('slip-gaji.destroy');

    // aweawe
    Route::get('/periode/create', 'PeriodeController@create')->name('periode.create');
    Route::post('/periode/create', 'PeriodeController@store')->name('periode.store');
    Route::delete('/periode/{periode}', 'PeriodeController@destroy')->name('periode.destroy');
});

/**
 * Auth routes
 */
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::get('/login', 'AuthController@login')->name('login')->middleware('guest');
    Route::post('/login', 'AuthController@login_post')->name('login.post')->middleware('guest');
    Route::post('/logout', 'AuthController@logout')->name('logout')->middleware('auth');
    Route::get('/home', 'AuthController@home')->name('home')->middleware('auth');
});