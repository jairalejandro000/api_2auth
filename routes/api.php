<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/prueba', 'App\Http\Controllers\UserController@Prueba');
Route::post('/create', 'App\Http\Controllers\UserController@Create');
Route::get('/show', 'App\Http\Controllers\UserController@Show');
Route::post('/logIn', 'App\Http\Controllers\UserController@LogIn');
Route::post('/logOut', 'App\Http\Controllers\UserController@LogOut');
Route::post('/code', 'App\Http\Controllers\UserController@code');
Route::get('/pdf_code', 'App\Http\Controllers\UserController@PDF_code')->name('pdf_code');
Route::post('/sent_pdf_code', 'App\Http\Controllers\UserController@SendPDF_code')->name('sent_pdf_code');
