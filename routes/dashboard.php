<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Auth::routes(['verify' => true]);
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

    Route::resource('type', 'TypeController')->except('show');
    Route::get('type-getDatatable', 'TypeController@getDatatable')->name('type.getDatatable');
    Route::post('type/destroy', ['as' => 'type.destroy', 'uses' => 'TypeController@destroy']);

    Route::get('/activity-log', 'ActivitylogController@index')->name('activity-log.index');
    Route::get('activity-log-getDatatable', 'ActivitylogController@getDatatable')->name('activity-log.getDatatable');

    Route::get('/settings', 'SettingController@index')->name('settings.index');

    Route::post('/settings', 'SettingController@update')->name('settings.update');
});
