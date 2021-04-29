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

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('auctions', 'AuctionController')->only(['index', 'show']);
    Route::resource('profile', 'AuctionController@index');
    Route::get('user/store', 'AuctionController@index');
    Route::get('user/auctions', 'AuctionController@index');

});

