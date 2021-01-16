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

    Route::patch('/change_password', 'UserController@updatePassword')->name('change_password');
	Route::view('/change_password', 'change_password');

	Route::resource('/user', 'UserController');
	Route::post('/user/datatables', 'UserController@datatables')->name('user.datatables');

    // Category Routes
    Route::resource('/category', 'CategoryController');
    Route::prefix('/category')->name('category.')->group(function ()
	{
		Route::post('/datatables', 'CategoryController@datatables')->name('datatables');
		Route::post('/select', 'CategoryController@select')->name('select');
	});

	Route::resource('/stuff', 'StuffController');
	Route::prefix('/stuff')->name('stuff.')->group(function () 
	{
		Route::post('/datatables', 'StuffController@datatables')->name('datatables');
		Route::post('/select', 'StuffController@select')->name('select');
		Route::post('/code', 'StuffController@selectCode')->name('select.code');
	});

	Route::prefix('/stock')->name('stock.')->group(function ()
	{
		Route::view('/', 'stock.index')->name('index');

		Route::patch('/store', 'StockController@store')->name('store');
		
		Route::post('/datatables', 'StockController@datatables')->name('datatables');
		
		Route::delete('/destroy/{id}', 'StockController@destroy')->name('destroy');
	});
});

Route::namespace('Auth')->group(function ()
{
	Route::get('/login', 'LoginController@showLoginForm');
	Route::post('/login', 'LoginController@login')->name('login');
	
	Route::get('/logout', 'LoginController@logout')->name('logout');
});
