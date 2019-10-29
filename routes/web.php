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
    return view('main');
});

Auth::routes();

// ---------------Category advert start-----------------------------------//

//Route::get('/categories','CategoryController@show')->name('category.single');

//Route::get('/category/adverts', 'AdvertController@index')->name('advert.index');
//
//Route::get('adverts', 'AdvertController@show_nt_adverts')->name('adverts.nt_advert');

//Route::get('/home','HomeController@index'); - atjungiamas kaip nereikalingas

//Route::get('/admin/advert', 'AdvertController@index')->name('admin.adverts');


//Route::get('/', 'AdvertController@index')->name('adverts.index');

Route::resource('categories','CategoryController');

Route::get('/admin/categories', 'CategoryController@index')->name('category.index');

Route::get('/admin/categories/{id}/edit', 'CategoryController@edit')->name('category.edit');

Route::put('/admin/categories/{id}', 'CategoryController@update')->name('category.update');
//Route::resource('cities','CityController');

Route::resource('comment', 'CommentController');

//-------------Messages route start--------------------//
//-------------Admin messages start--------------------//
Route::get('/admin/messages', 'MessageController@indexAdmin')->name('messages.admin');

Route::get('/admin/messages/create', 'MessageController@create')->name('messages.create');

Route::post('admin/messages/store','MessageController@store')->name('messages.store');

Route::get('/admin/messages/sent', 'MessageController@showAllMsg')->name('messages.sent');
//------------Admin messages end----------------------//



//-------------Messages route end-----------------//
//----------Cities routes start---------------------//
Route::get('/admin/cities', 'CityController@index')->name('cities.index');

Route::get('/admin/cities/create', 'CityController@create')->name('cities.create');

Route::post('/admin/cities/store', 'CityController@store')->name('cities.store');

Route::get('/admin/cities/{id}/edit', 'CityController@edit')->name('cities.edit');

Route::put('/admin/cities/{id}', 'CityController@update')->name('cities.update');
//------------------Cities route end-----------------

Route::delete('/admin/cities/{id}/delete', 'CityController@destroy')->name('cities.destroy');

Route::get('/user/adverts', 'UserController@index')->name('user.advert');

Route::get('/user/messages', 'MessageController@index')->name('messages.index'); //kelias iš nuorodos

Route::get('/user/advert/create', 'AdvertController@create')->name('adverts.create');

Route::get('/user/messages/{id}', 'MessageController@show')->name('message.show');



Route::resource('advert','AdvertController');



//Route::resource('user', 'UserController');

Route::resource('admin', 'AdminController');

Route::get('/search', 'AdvertController@search')->name('adverts.index');

//Route::resource('messages','MessageController');

//Route::get('messages', 'MessageController@index')->name('messages.index');
//Route::get('messages/{id}', 'MessageController@show')->name('message.show');

//Route::get('api/subscribers','Api\SubscribersController@index');
//Route::get('advert/action','AdvertController@action')->name('adverts.ajax.search_result'); Roberto pagalba


//Route::get('/live_search','LiveSearch@index'); //set route for live_search controller. Call index method on live search controller
//Route::get('live_search/action','LiveSearch@action')->name('live_search.action'); //name for ajax

