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

    // Category Routes
    Route::resource('/category', 'CategoryController');
    Route::prefix('/category')->name('category.')->group(function ()
	{
		Route::post('/datatables', 'CategoryController@datatables')->name('datatables');
	});
});

Route::namespace('Auth')->group(function ()
{
	Route::get('/login', 'LoginController@showLoginForm');
	Route::post('/login', 'LoginController@login')->name('login');
	
	Route::get('/logout', 'LoginController@logout')->name('logout');
});
