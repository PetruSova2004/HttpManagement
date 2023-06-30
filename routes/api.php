<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/urls/{user_id}','App\Http\Controllers\Api\UrlController@getAllUrls');
Route::post('/urlStore/{user_id}', 'App\Http\Controllers\Api\UrlController@storeUrl')->name('storeUrl');
Route::get('/url/{id}', 'App\Http\Controllers\Api\UrlController@redirectToUrl');
Route::post('/customUrlStore/{user_id}', 'App\Http\Controllers\Api\UrlController@storeCustomUrl')->name('customStoreUrl');

Route::get('/admin/users','App\Http\Controllers\Api\AdminController@getUsers');
Route::get('/admin/urls','App\Http\Controllers\Api\AdminController@getUrls');

