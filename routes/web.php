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

Route::group(['namespace' => 'App\Http\Controllers\Site'], function () {
    Route::get('/', 'ContactController@index')->name('home');
    Route::get('/meus-contatos', 'ContactController@show')->name('contact.show');
    Route::get('/contato', 'ContactController@index')->name('contact');
    Route::post('/contato/store', 'ContactController@store')->name('contact.store');
});
