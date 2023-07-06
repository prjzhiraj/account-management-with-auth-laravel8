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

// home or login page
Route::get('/', function () {
	if(session('account_id')){
		return view('accounts', array('title' => 'Account Management System', 'session' => session('account_id')));
	}else{
		return view('home', array('title' => 'Login | Just a website'));
	}
});
Route::POST('/login', 'AccountsController@login');
Route::POST('/registerAccount', 'AccountsController@register');
Route::get('/logout', 'AccountsController@logout');
Route::get('/refreshToken', 'AccountsController@refreshToken');
Route::get('/accounts', function () {
	if(session('account_id')){
		return view('accounts', array('title' => 'Welcome ' .session('fullname').' | Account Management System', 'session' => session('account_id')));
	}else{
		return redirect('/');
	}
});

// accounts page
Route::get('/getAccounts', 'AccountsController@getAllAccounts');
Route::get('/editAccount/{id}', 'AccountsController@editAccount');
Route::post('/updateAccount', 'AccountsController@updateAccount');
Route::get('/deleteConfirm/{id}', 'AccountsController@deleteConfirm');
Route::post('/deleteAccount/{id}', 'AccountsController@deleteAccount');

Route::group(['prefix' => "booking",'as' => "booking."], function () {
	Route::post('/', ['as' => "index", 'uses' => "BookingController@index"]);
	Route::get('my-booking', ['as' => "my_booking", 'uses' => "BookingController@myBooking"]);
	Route::get('available-date', ['as' => "available_date", 'uses' => "BookingController@getBookedDate"]);
	Route::post('book-now', ['as' => "book_now", 'uses' => "BookingController@booknow"]);
	Route::post('cancel-book', ['as' => "cancel_book", 'uses' => "BookingController@cancelbook"]);

  });
