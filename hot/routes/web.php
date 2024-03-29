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


Auth::routes();

Route::get('/', 'PostController@index');
Route::post('follow/{user}', 'FollowController@store');
Route::get('profile/{user}', 'ProfileController@show')->name('profile.show');
Route::get('p/create', 'PostController@create');
Route::post('p', 'PostController@store');
Route::get('p/{post}','PostController@show');
Route::get('profile/{user}/edit','ProfileController@edit');
Route::put('profile/{user}','ProfileController@update');
