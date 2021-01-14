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

Route::middleware('auth')->group(function() 
{
    Route::get('/', 'HomeController@index')->name('home');
});

Route::namespace('Auth')->group(function ()
{
	Route::get('/login', 'LoginController@showLoginForm');
	Route::post('/login', 'LoginController@login')->name('login');
	
	Route::get('/logout', 'LoginController@logout')->name('logout');
});
