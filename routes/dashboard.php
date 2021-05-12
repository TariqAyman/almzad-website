<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Auth::routes([
        'verify' => true,
        'register' => false
    ]);
});

Route::group(['middleware' => ['auth:admin', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    /**
     * Clear Cache
     */
    Route::get('/fix', function () {
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        \Artisan::call('config:clear');
        return redirect()->back();
    })->name('fix');

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('admins', 'AdminController');
    Route::get('admins-getDatatable', 'AdminController@getDatatable')->name('admins.getDatatable');
    Route::post('admins/destroy', ['as' => 'admins.destroy', 'uses' => 'AdminController@destroy']);

    Route::resource('user', 'UserController');
    Route::get('user-getDatatable', 'UserController@getDatatable')->name('user.getDatatable');
    Route::post('user/destroy', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);

    Route::get('/profile', 'ProfileController@profile')->name('profile.edit');
    Route::post('/profile', 'ProfileController@profileUpdate')->name('profile.update');

    Route::resource('roles', 'RoleController')->except('show');
    Route::post('roles/destroy', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy']);

    Route::resource('permissions', 'PermissionController')->except(['show', 'destroy']);
    Route::post('permissions/save', ['as' => 'permissions.save', 'uses' => 'PermissionController@saveRolePermissions']);
    Route::post('permissions/destroy', ['as' => 'permissions.destroy', 'uses' => 'permissions@destroy']);

    Route::resource('category', 'CategoryController')->except('show');
    Route::get('category-getDatatable', 'CategoryController@getDatatable')->name('category.getDatatable');
    Route::post('category/destroy', ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);

    Route::resource('slider', 'SliderController')->except('show');
    Route::get('slider-getDatatable', 'SliderController@getDatatable')->name('slider.getDatatable');
    Route::post('slider/destroy', ['as' => 'slider.destroy', 'uses' => 'SliderController@destroy']);

    Route::resource('type', 'TypeController')->except('show');
    Route::get('type-getDatatable', 'TypeController@getDatatable')->name('type.getDatatable');
    Route::post('type/destroy', ['as' => 'type.destroy', 'uses' => 'TypeController@destroy']);

    Route::resource('wallet', 'WalletController')->except('show');
    Route::get('wallet-getDatatable', 'WalletController@getDatatable')->name('wallet.getDatatable');

    Route::resource('transaction', 'TransactionController')->except('show');
    Route::get('transaction-getDatatable', 'TransactionController@getDatatable')->name('transaction.getDatatable');

    Route::get('contactus', 'ContactUsController@index')->name('contactus');
    Route::get('contactus-getDatatable', 'ContactUsController@getDatatable')->name('contactus.getDatatable');

    Route::resource('auction', 'AuctionController')->except('show');
    Route::get('auction-getDatatable', 'AuctionController@getDatatable')->name('auction.getDatatable');
    Route::post('auction/destroy', ['as' => 'auction.destroy', 'uses' => 'AuctionController@destroy']);
    Route::delete('auction/{id}/remove-image/{imageId}', 'AuctionController@removeImage')->name('auction.remove-image');
    Route::post('comments/changeStatus', ['as' => 'comments.changeStatus', 'uses' => 'AuctionController@commentChangeStatus']);

    Route::get('/activity-log', 'ActivitylogController@index')->name('activity-log.index');
    Route::get('activity-log-getDatatable', 'ActivitylogController@getDatatable')->name('activity-log.getDatatable');

    Route::get('/settings', 'SettingController@index')->name('settings.index');

    Route::post('/settings', 'SettingController@update')->name('settings.update');
});
