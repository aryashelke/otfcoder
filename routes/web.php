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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pdf', function() {
	return view('index');
});

Route::get('/', 'UserController@index');

Route::post('/pdf-upload', 'PdfController@uploadPdf')->name('pdf-upload');

// Route::get('/test', 'PdfController@test');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
