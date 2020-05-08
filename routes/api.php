<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('profile', 'UserController@getAuthenticatedUser');


Route::get('cities', 'MainController@index');
Route::get('cities/{id}', 'MainController@show');
Route::post('cities', 'MainController@store');
Route::put('cities/{id}', 'MainController@update');
Route::post('cities/{id}', 'MainController@delete');

Route::get('hotels', 'HotelsController@getHotels');
Route::get('cities', 'MainController@getCities');




