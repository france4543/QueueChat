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

Route::get('/', 'WelcomeController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//profile
Route::get('/barber/profile', 'ProfileController@get_barberProfile')->middleware('user_role');
Route::post('/barber/profile', 'ProfileController@post_barberProfile')->middleware('user_role');

Route::get('/member/profile', 'ProfileController@get_memberProfile');
Route::post('/member/profile', 'ProfileController@post_memberProfile');

Route::resource('/home', 'DashBoardController')->middleware('auth');

Route::resource('/barber/service', 'ServiceController')->middleware('user_role');

Route::get('/member/order', 'MemberController@get_my_order');

Route::get('/barber/customer', 'BarberController@get_for_rent')->middleware('user_role');
Route::post('/barber/customer/{id}', 'BarberController@post_for_rent');
Route::put('/barber/customer/{id}', 'BarberController@reject_for_rent');

Route::get('/member/chat/{id}', 'ChatController@get_member');
Route::get('/barber/chat/{id}', 'ChatController@get_barber');