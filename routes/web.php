<?php

use Illuminate\Support\Facades\Route;

// login & register
Route::middleware('guest')->group(function(){
    Route::get('/register', function () {
        return view('auth.register');
    });
    Route::get('/', function () {
        return view('auth.login');
    });
});
Auth::routes();

Route::middleware('auth')->group(function(){
    // dashboard
    Route::get('/dashboard', 'HomeController@index')->name('home');
    // profil user
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/setting', 'UserController@edit')->name('setting');
        Route::patch('/setting/update', 'UserController@update')->name('update');
    });
    // change password
    Route::prefix('account')->name('password.')->group(function(){
        Route::get('/password', 'UserController@changePassword')->name('edit');
        Route::patch('/password', 'UserController@updatePassword')->name('edit');
    });
    // admin 
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        // management account
        Route::prefix('account')->name('account.')->group(function(){
            // per view & role
            Route::get('/admin', 'AccountController@admin_index_account')->name('admin');
            Route::get('/customer', 'AccountController@user_index_account')->name('user');
            // register account
            Route::resource('register', 'AccountController')->except(['admin_index_account', 'costumer_index_account', 'boss_index_account']);
        });
    });
});