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
    // return view('welcome');
    return redirect()->route('login');
});

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);



Route::group(['prefix' => 'admin',  'middleware' => 'auth',  'middleware' => 'role:admin'], function() {
    //Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('users', 'UserController@users')->name('list_users');
    Route::get('add_user', 'UserController@add_user_view')->name('add_user');
    Route::get('delete_user/{id}', 'UserController@delete_user')->name('delete_user');
    Route::post('add_user_post', 'UserController@add_user_post')->name('add_user_post');
    Route::get('pending_user', 'UserController@pending_user')->name('pending_user');
    Route::get('update_pending_user/{id}', 'UserController@update_pending_user')->name('update_pending_user');
});

// FM Route
Route::group(['prefix' => 'fm',  'middleware' => 'auth',  'middleware' => 'role:admin,fm', 'as' => 'fm.'], function(){
    Route::get('unapproved_list', 'FmController@index')->name('unapproved_list');
    Route::get('create_case', 'FmController@create_case')->name('create_case');
    Route::post('store', 'FmController@store')->name('store');
    Route::get('show', 'FmController@show')->name('show');
});
