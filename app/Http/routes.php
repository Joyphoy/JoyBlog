<?php

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
