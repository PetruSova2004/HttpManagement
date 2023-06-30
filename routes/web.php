<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', 'App\Http\Controllers\Pub\Index\IndexController@index')->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'App\Http\Controllers\Pub\Auth\LoginController@index')->name('login.index');
    Route::post('/loginStore', 'App\Http\Controllers\Pub\Auth\LoginController@login')->name('login.store');

    Route::get('/register', 'App\Http\Controllers\Pub\Auth\RegisterController@index')->name('register.index');
    Route::post('/registerStore', 'App\Http\Controllers\Pub\Auth\RegisterController@store')->name('register.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'App\Http\Controllers\Pub\Auth\LoginController@logout')->name('logout');
    Route::get('/', 'App\Http\Controllers\Pub\Url\UrlController@index')->name('pub.url.index');
    Route::get('/storeUrl', 'App\Http\Controllers\Pub\Url\UrlController@store')->name('pub.url.store');
    Route::get('/storeCustomUrl', 'App\Http\Controllers\Pub\Url\UrlController@storeCustom')->name('pub.custom_url.store');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'App\Http\Controllers\Admin\Index\IndexController@index')->name('admin.index');
    Route::get('/users', 'App\Http\Controllers\Admin\User\UserController@showView')->name('admin.users.index');
    Route::get('/urls', 'App\Http\Controllers\Admin\Url\UrlController@index')->name('admin.urls.index');
});

