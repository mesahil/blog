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




Route::get('/home', 'PostsController@index');
Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');
Route::resource('/posts','PostsController');

Auth::routes();
Route::get('/', 'PostsController@index');

Route::get('/blog', 'HomeController@index')->name('home');

// 	//Route::get('/', 'HomeController@index');	
// if(Route::has('register')){
// 	Route::get('/', 'PagesController@index');
// }
// else{
// 	Route::get('/', 'PagesController@index');
// }

// Route::get('/', function(){

// 	if(Route::has('register')){

// 		//Route::get('/', 'HomeController@index')->name('home');
// 		return view('home');
// 		//Route::get('/', 'HomeController@index')->name('home');
// 	}
// 	else{
// 		//Route::get('/', 'PagesController@index');
// 		return view('auth.login');
// 	}
// });

	
