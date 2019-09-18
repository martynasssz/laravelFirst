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

Route::get('/', function () {
    return view('welcome');

});
Auth::routes();

Route::get('/home','HomeController@index');

//Route::get('/admin/advert', 'AdvertController@index')->name('admin.adverts');




Route::resource('categories','CategoryController');

Route::resource('cities','CityController');

Route::resource('comment', 'CommentController');

Route::get('/admin/messages', 'MessageController@index')->name('messages.index');

Route::get('/user/adverts', 'UserController@index')->name('user.advert');

Route::get('/user/messages', 'MessageController@index')->name('messages.index');

Route::get('/user/advert/create', 'AdvertController@create')->name('adverts.create');

Route::get('/user/messages/{id}', 'MessageController@show')->name('message.show');

Route::resource('advert','AdvertController');

//Route::resource('user', 'UserController');

Route::resource('admin', 'AdminController');

//Route::resource('messages','MessageController');

//Route::get('messages', 'MessageController@index')->name('messages.index');
//Route::get('messages/{id}', 'MessageController@show')->name('message.show');

//Route::get('api/subscribers','Api\SubscribersController@index');