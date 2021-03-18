<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// login & register
Route::middleware('guest')->group(function(){
    // user landing page
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/register', function () {
        return view('auth.register');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::prefix('user')->namespace('User')->name('user.')->group(function(){
        Route::get('/register', 'RegisterUser@index')->name('register');
    });
});

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function(){
    // dashboard
    Route::get('/home', 'HomeController@index')->name('home');
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
        Route::prefix('account')->name('account.')->group(function () {
            // per view & role
            Route::get('/admin', 'AccountController@admin_index_account')->name('admin');
            Route::get('/customer', 'AccountController@user_index_account')->name('customer');
            // register account
            Route::resource('register', 'AccountController');
        });
        Route::prefix('rekapdata')->name('rekapdata.')->group(function () {
            Route::get('/Bulan', 'RekapdataController@getBulan')->name('bulan');
            Route::get('/Tahun', 'RekapdataController@getTahun')->name('tahun');
        });
        Route::prefix('detaildata')->name('detaildata.')->group(function () {
            Route::get('/AngsuranKe','DetaildataController@getAngsuranKe')->name('angsuranke');
            Route::get('/Pokok','DetaildataController@getPokok')->name('pokok');
            Route::get('/Bunga','DetaildataController@getBunga')->name('bunga');
            Route::get('/BesarAngsuran','DetaildataController@getBesarAngsuran')->name('besarangsuran');
            Route::get('/SisaAngsuran','DetaildataController@getSisaAngsuran')->name('sisaangsuran');
        });
    });
});
