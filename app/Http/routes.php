<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

	Route::auth();

	Route::get('admin', ['as' => 'admin', 'uses' => 'HomeController@redirectAdmin']);
	
    Route::get('/', ['as'=>'live-page', 'uses'=>'HomeController@index']);

    Route::get('contact', ['as'=>'contact', 'uses'=>'ContactController@index']);

	Route::post('contact', 'ContactController@store');

	Route::get('subscriptions', 'SubscriptionController@index');

    Route::resource('subscription/header', 'SubscriptionController');

    Route::resource('subscription/footer', 'SubscriptionController');

    Route::get('about-page', 'AboutPageController@showLive');

    Route::get('news-list/{year?}/{month?}', ['as'=>'news-list', 'uses'=>'NewsController@newsList']);

    Route::get('single-news/{url}', 'NewsController@getSingleNews');

    Route::get('research-list', 'ResearchController@researchList');

    Route::get('materials-list', 'MaterialsController@materialsList');

	Route::group(['middleware' => 'user.with.role:admin'],function(){

		Route::resource('users', 'UserController');

		Route::get('users/{users}/change-password', ['as' => 'inner-admin-change-pass', 'uses' => 'UserController@changeUserPassword']);

		Route::post('users/{users}/change-password', ['as' => 'post-inner-admin-change-pass', 'uses' => 'UserController@postChangedUserPassword']);

		Route::resource('partners', 'PartnersController');

		Route::get('delete-partner/{partner}', ['as' => 'delete-partner', 'uses' => 'PartnersController@destroy']);

		Route::resource('about', 'AboutPageController');

		Route::get('delete-about-user/{user}', ['as' => 'delete-about-user', 'uses' => 'AboutPageController@destroy']);

		Route::resource('news', 'NewsController');

		Route::get('delete-news/{news}', ['as' => 'delete-news', 'uses' => 'NewsController@destroy']);

		Route::resource('materials', 'MaterialsController');

		Route::get('delete-material/{materials}', ['as' => 'delete-material', 'uses' => 'MaterialsController@destroy']);

		Route::resource('research', 'ResearchController');

		Route::get('delete-research/{research}', ['as' => 'delete-research', 'uses' => 'ResearchController@destroy']);
	
	});
	
});
