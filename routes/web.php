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
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/create', 'App\Http\Controllers\UserController@Create');
Route::get('/show', 'App\Http\Controllers\UserController@Show');
Route::post('/logIn', 'App\Http\Controllers\UserController@LogIn');
Route::post('/logOut', 'App\Http\Controllers\UserController@LogOut');
Route::post('/code', 'App\Http\Controllers\UserController@code');
Route::get('/pdf_code', 'App\Http\Controllers\UserController@PDF_code')->name('pdf_code');
Route::post('/sent_pdf_code', 'App\Http\Controllers\UserController@SendPDF_code')->name('sent_pdf_code');
