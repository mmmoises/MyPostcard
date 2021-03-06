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

Route::get('/', 'PostcardsController@index');
Route::post('/imagepdf', 'PostcardsController@pdf')->name('pdf.generate');
Route::get('/imagethumb', 'PostcardsController@thumbnail')->name('thumb.generate');

Route::get('/api_price','PostcardsController@price')->name('price.id');;
