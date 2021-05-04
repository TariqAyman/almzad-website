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

Route::group(['namespace' => 'Frontend'], function () {

    Auth::routes(['verify' => true]);

    Route::get('phone_verify', 'PhoneVerifyController@index')->name('phone_verify');
    Route::post('phone_verify', 'PhoneVerifyController@store')->name('phone_verify.post');

    Route::group(['as' => 'frontend.', 'middleware' => 'web'], function () {

        Route::resource('contact-us', 'ContactUsController');

        Route::post('payment/responseURL', 'PaymentController@successCallback')->name('payment.responseURL');
        Route::post('payment/errorURL', 'PaymentController@errorCallback')->name('payment.errorURL');

        Route::get('/', 'HomeController@index');
        Route::resource('auctions', 'AuctionController')->only(['index', 'show']);

        Route::group(['middleware' => ['auth:user','phoneVerify']], function () {

            Route::post('payment/create', 'PaymentController@store')->name('payment.store');

            Route::resource('profile', 'ProfileController');
            Route::resource('wallet', 'WalletController');
            Route::get('user/store', 'StoreController@myStore')->name('user.store');
            Route::get('user/store/edit', 'StoreController@create')->name('user.store.edit');
            Route::post('user/store/save', 'StoreController@store')->name('user.store.save');
            Route::post('user/comment', 'CommentController@store')->name('user.comment');
            Route::resource('user/auctions', 'AuctionUserController')->names('user.auctions')->only([
                'edit', 'store', 'update', 'create'
            ]);

            Route::resource('auctions', 'AuctionController')->only(['store']);
            Route::post('auctions/buyNow', 'AuctionController@buyNow')->name('auctions.buyNow');
        });
    });
});

