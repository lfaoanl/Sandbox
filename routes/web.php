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

Route::get('/{par1}',                       'VueController@index');
Route::get('/{par1}/{par2}',                'VueController@index');
Route::get('/{par1}/{par2}/{par3}',         'VueController@index');
Route::get('/{par1}/{par2}/{par3}/{par4}',  'VueController@index');