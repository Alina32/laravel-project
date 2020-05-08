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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cities', 'MainController@index');
Route::post('/cities', 'MainController@store');
Route::delete('/remove_city', 'MainController@destroy');
Route::patch('/edit_city', 'MainController@edit');


/*
|--------------------------------------------------------------------------
| Web Routes Auth
|--------------------------------------------------------------------------
*/

Auth::routes();





/*
|--------------------------------------------------------------------------
| Web Routes lessons
|--------------------------------------------------------------------------
*/

Route::get('/posts/{post}', function ($post) {

	$posts =[
		'first'=> 'hello',
		'second'=> 'bye'
    ];

    if(! array_key_exists($post, $posts)) {
    	abort(404, 'Not found');
    }

    return view('post', [
    	'post' =>$posts[$post]
    ]);
});