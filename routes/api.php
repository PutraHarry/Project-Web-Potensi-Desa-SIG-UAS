<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pasar','PasarController@datapasar')->name('pasar');
Route::get('/pasar/create','PasarController@createdata');
Route::post('/pasar/insert','PasarController@insert');
Route::get('/pasar/edit/{id}','PasarController@editdata');
Route::post('/pasar/update/{id}','PasarController@update');
Route::get('/pasar/delete/{id}','PasarController@delete');
