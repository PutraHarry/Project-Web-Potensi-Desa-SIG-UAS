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

#Guest
Route::get('/','GuestController@guest')->name('landing');
Route::get('/guest/sekolah','GuestController@guestsekolah');
Route::get('/guest/pasar','GuestController@guestpasar');
Route::get('/guest/tempat-ibadah','GuestController@guesttempatibadah');
Route::get('/guest/tempat-belanja','GuestController@guesttempatbelanja');

Route::get('/login','GuestController@loginuser');
Route::get('/dashboard','AdminController@dashboard')->name('dashboard');


#Sekolah
Route::get('/sekolah','SekolahController@datasekolah');
Route::get('/sekolah/create','SekolahController@createdata');
Route::post('/sekolah/insert','SekolahController@insert');
Route::get('/sekolah/edit/{id}','SekolahController@editdata');
Route::post('/sekolah/update/{id}','SekolahController@update');
Route::get('/sekolah/delete/{id}','SekolahController@delete');

#Pasar
Route::get('/pasar','PasarController@datapasar')->name('pasar');
Route::get('/pasar/create','PasarController@createdata');
Route::post('/pasar/insert','PasarController@insert');
Route::get('/pasar/edit/{id}','PasarController@editdata');
Route::post('/pasar/update/{id}','PasarController@update');
Route::get('/pasar/delete/{id}','PasarController@delete');

#Tempat Perbelanjaan
Route::get('/tempat-ibadah','TempatIbadahController@datatempatibadah');
Route::get('/tempat-ibadah/create','TempatIbadahController@createdata');
Route::post('/tempat-ibadah/insert','TempatIbadahController@insert');
Route::get('/tempat-ibadah/edit/{id}','TempatIbadahController@editdata');
Route::post('/tempat-ibadah/update/{id}','TempatIbadahController@update');
Route::get('/tempat-ibadah/delete/{id}','TempatIbadahController@delete');

#Tempat Ibadah
Route::get('/tempat-belanja','TempatPerbelanjaanController@datatempat_perbelanjaan');
Route::get('/tempat-belanja/create','TempatPerbelanjaanController@createdata');
Route::post('/tempat-belanja/insert','TempatPerbelanjaanController@insert');
Route::get('/tempat-belanja/edit/{id}','TempatPerbelanjaanController@editdata');
Route::post('/tempat-belanja/update/{id}','TempatPerbelanjaanController@update');
Route::get('/tempat-belanja/delete/{id}','TempatPerbelanjaanController@delete');


#Auth Route
Route::get('/login', 'AuthController@loginForm')->name('Form Login')->middleware('guest');
Route::post('/login', 'AuthController@login')->name('Login');
Route::get('/logout', 'AuthController@logout')->name('Logout');

#Tentang
Route::get('/tentang', function () {
    return view('layouts.tentang');
});

Route::get('/guest/tentang', function () {
    return view('user.guest_tentang');
});

