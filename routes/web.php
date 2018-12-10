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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/offerte', 'QuoteController');

Route::get('/privacy/toestemming', 'ConsentController@create');
Route::post('/privacy/toestemming', 'ConsentController@store');

Route::resource('/toestemming', 'ConsentController');

Route::get('/school', 'SchoolController@index');
Route::get('/school/nieuw', 'SchoolController@create');
Route::get('/school/{slug}', 'SchoolController@show');
Route::get('/school/{slug}/bewerken', 'SchoolController@edit');
Route::resource('/schools', 'SchoolController');

Route::get('/klassen/nieuw', 'SchoolclassController@create');
Route::post('/klassen/nieuw', 'SchoolclassController@store');

Route::get('/mails', function () {
    $quote = \App\Quote::first();

    return new App\Mail\NewQuote($quote);
});
