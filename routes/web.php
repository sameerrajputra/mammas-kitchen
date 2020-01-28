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

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/', 'ReservationController@reserve')->name('reservation.reserve');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/contact', 'ContactController@sendMessage')->name('contact.send');

Auth::routes();



//Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

Route::group(['prefix'=>'admin', 'middleware'=>'auth', 'namespace'=>'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::resource('slider', 'SliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::delete('reservation/{id}','ReservationController@destroy')->name('reservation.destroy');
	Route::put('reservation/{id}','ReservationController@update')->name('reservation.update');
	Route::get('reservation', 'ReservationController@index')->name('reservation.index');
	Route::get('contact', 'ContactController@index')->name('contact.index');
});
