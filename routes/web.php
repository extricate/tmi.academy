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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/offerte', 'QuoteController');
Route::resource('/toestemming', 'ConsentController');
Route::get('/schools/{slug}', 'SchoolController@show');
Route::resource('/schools', 'SchoolController');

Route::get('/mails', function () {
    $quote = \App\Quote::first();

    return new App\Mail\NewQuote($quote);
});
