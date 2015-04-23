<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Static pages
 */
Route::get('/', 'PagesController@home');

/**
 * Resources
 */
Route::resource('articles', 'ArticlesController');
Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);
Route::resource('users.articles', 'UsersController', ['only' => ['index']]);

/**
 * Authentication
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
