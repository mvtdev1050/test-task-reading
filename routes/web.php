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
    return Redirect::to('login');
});
Route::get('/user', function () {
    return view('user');
});

Route::middleware('auth')->group(function () {
	
	Route::any('logout', 'DashboardController@logout')->name('logout');   
	Route::group( ['prefix' => 'admin','middleware'=>'check_role'], function () {
		Route::get('/', 'DashboardController@index')->name('dashboard');   
		Route::any('/report', 'DashboardController@report')->name('report');
		Route::any('/users', 'UsersController@index')->name('users');
		Route::any('/user/add', 'UsersController@add')->name('addUser');
		Route::any('/user/edit/{id}', 'UsersController@edit')->name('editAccount');
		Route::any('/user/delete/{id}', 'UsersController@delete')->name('delete');
		Route::any('/user/update', 'UsersController@update')->name('updateAccount');
		

	});
});
Auth::routes();