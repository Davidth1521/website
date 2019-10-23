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

Route::middleware('auth')->namespace('index_page')->group(function () {
    Route::resource('/primary', 'PrimaryController');
    Route::resource('/slider1', 'Slider1Controller');
    Route::resource('/ourDescription', 'OurDescriptionController');
    Route::resource('/aboutUs', 'AboutUsController');
    Route::resource('/portfolio', 'PortfolioController');
    Route::resource('/portfolioCategory', 'PortfolioCategoryController');
    Route::resource('/customerSay', 'CustomerSayController');
    Route::resource('/ourTeam','OurTeamController');
    Route::resource('/free_advice','FreeAdviceController');
});
