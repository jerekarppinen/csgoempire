<?php

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
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
Route::get('user/{steamid}', 'UserController@getUser')->name('get.user');
Route::get('user/inventory/{steamid}', 'UserController@getInventory')->name('get.user');
Route::get('/', function () {
    return view('welcome');
});
