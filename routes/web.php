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
Route::get('/', 'pagesController@home');

Route::get('/badtv', 'pagesController@badtv');

Route::get('/phpplayground', 'pagesController@phpplayground');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/userlist', 'HomeController@userlist');

//Route::get('/form', 'CreativeController@index');

//Route::post('/creativeupload', 'CreativeController@store');

Route::resource('cplcampaigns', 'CplCampaignsController');

Route::resource('creatives', 'CreativeController');
