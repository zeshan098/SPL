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
    Route::get('approved_product_list', 'UserController@approved_product_list')->name('approved_product_list');
    Route::get('product_list', 'UserController@product_list')->name('product_list');
    Route::get('update_product_list/{id}', 'UserController@update_product_list')->name('update_product_list');
    Route::get('delete_product/{id}', 'UserController@delete_product')->name('delete_product');
    //FM escalation_hierarchies 
    Route::get('fm_escalation_record', 'UserController@fm_escalation_record')->name('fm_escalation_record');
    Route::post('fm_absent', 'UserController@fm_absent')->name('fm_absent');
    Route::post('findZm', 'UserController@findZm')->name('findZm');
    //ZM escalation_hierarchies 
    Route::get('zm_escalation_record', 'UserController@zm_escalation_record')->name('zm_escalation_record');
    Route::post('zm_absent', 'UserController@zm_absent')->name('zm_absent');
    Route::post('findFm', 'UserController@findFm')->name('findFm');
    //NSM escalation_hierarchies 
    Route::get('nsm_escalation_record', 'UserController@nsm_escalation_record')->name('nsm_escalation_record');
    Route::post('nsm_absent', 'UserController@nsm_absent')->name('nsm_absent');
    Route::post('find_Zm', 'UserController@find_Zm')->name('find_Zm');

    //Update Password 
    Route::get('update_password/{id}', 'UserController@update_password')->name('update_password');
    Route::post('password/{id}', 'UserController@password')->name('password'); 

    //Item
    Route::get('add_item_post', 'ItemController@add_item_post')->name('add_item_post');
    Route::post('add_item', 'ItemController@add_item')->name('add_item');
    Route::get('item_list', 'ItemController@item_list')->name('item_list');
    Route::get('edit_item/{id}', 'ItemController@edit_item')->name('edit_item');
    Route::post('update_item/{id}', 'ItemController@update_item')->name('update_item');
    Route::get('delete_item/{id}', 'ItemController@delete_item')->name('delete_item');
    Route::get('item_team_list', 'ItemController@item_team_list')->name('item_team_list');
    Route::post('item_team', 'ItemController@item_team')->name('item_team');

    //station Detail
    Route::get('add_station_detail', 'ItemController@add_station_detail')->name('add_station_detail');
    Route::post('add_station', 'ItemController@add_station')->name('add_station');

    //Esclation
    Route::get('add_escalation_detail', 'Escalation_Hierarchy@add_escalation_detail')->name('add_escalation_detail');
    Route::post('add_escalation', 'Escalation_Hierarchy@add_escalation')->name('add_escalation');
    
    //zone_station_detail
    Route::get('fm_zone_station_detail', 'Escalation_Hierarchy@fm_zone_station_detail')->name('fm_zone_station_detail');
    Route::post('add_fm_zone_station', 'Escalation_Hierarchy@add_fm_zone_station')->name('add_fm_zone_station');
    Route::get('zone_station_list', 'Escalation_Hierarchy@zone_station_list')->name('zone_station_list');
    Route::get('escalation_list', 'Escalation_Hierarchy@escalation_list')->name('escalation_list');
});

// FM Route
Route::group(['prefix' => 'fm',  'middleware' => 'auth',  'middleware' => 'role:admin,fm', 'as' => 'fm.'], function(){
    Route::get('unapproved_list', 'FmController@index')->name('unapproved_list');
    Route::get('create_case', 'FmController@create_case')->name('create_case');
    Route::post('store', 'FmController@store')->name('store');
    Route::post('show', 'FmController@show')->name('show');
    Route::post('designation_show', 'FmController@designation_show')->name('designation_show');
    Route::get('view_save_cases', 'FmController@view_save_cases')->name('view_save_cases');
    Route::get('update_save_case/{id}', 'FMController@update_save_case')->name('update_save_case');
    Route::post('update/{id}', 'FmController@update')->name('update'); 
    Route::get('case_lists', 'FmController@case_lists')->name('case_lists');
    Route::get('reject_case_lists', 'FmController@reject_case_lists')->name('reject_case_lists');
    Route::get('view_case/{id}', 'FmController@view_case')->name('view_case');  
    Route::post('dr_detail', 'FmController@dr_detail')->name('dr_detail'); 
    Route::post('dr_name', 'FmController@dr_name')->name('dr_name');  
    Route::get('generate_new_pdf/{id}','FmController@generate_new_pdf')->name('generate_new_pdf');
    Route::post('rejected_case_check', 'FmController@rejected_case_check')->name('rejected_case_check');
    Route::get('dr_database_oracle', 'FmController@dr_database_oracle')->name('dr_database_oracle');
//Document Download
    
    Route::get('download_documents/{id}','FmController@download_documents')->name('download_documents'); 
    Route::get('retention_documents/{id}','FmController@retention_documents')->name('retention_documents');    
// FM Absents Route
    Route::get('fm_escalation_record', 'FmController@fm_escalation_record')->name('fm_escalation_record');
    Route::post('fm_absents', 'FmController@fm_absents')->name('fm_absents');
//Zm Case
    Route::get('zm_case_lists', 'FmController@zm_case_lists')->name('zm_case_lists');
    Route::get('zm_view_case/{id}', 'FmController@zm_view_case')->name('zm_view_case');
    Route::post('update_zm_case/{id}', 'FmController@update_zm_case')->name('update_zm_case');
    Route::get('generate-pdf/{id}','FmController@generatePDF')->name('generate-pdf');
//Fm Team
    Route::get('fm_team', 'FmController@fm_team')->name('fm_team');
    Route::post('add_team', 'FmController@add_team')->name('add_team');
    Route::get('fm_team_list', 'FmController@fm_team_list')->name('fm_team_list');
    Route::get('update_team/{id}', 'FmController@update_team')->name('update_team'); 
    Route::post('update_fm_team/{id}', 'FmController@update_fm_team')->name('update_fm_team'); 

//FM Monthly Plan
    Route::get('monthly_work_plan', 'FmController@monthly_work_plan')->name('monthly_work_plan');
    Route::post('mso_work_plan_store', 'FmController@mso_work_plan_store')->name('mso_work_plan_store');
    
    Route::get('view_mso_plan', 'FmController@view_mso_plan')->name('view_mso_plan');
    Route::post('mso_plan', 'FmController@mso_plan')->name('mso_plan');
    Route::get('mso_get_value', 'FmController@mso_get_value')->name('mso_get_value');
    Route::post('edit_mso_plan', 'FmController@edit_mso_plan')->name('edit_mso_plan');
    Route::post('delete_mso_plan', 'FmController@delete_mso_plan')->name('delete_mso_plan');
});

// ZM Route
Route::group(['prefix' => 'zm',  'middleware' => 'auth',  'middleware' => 'role:admin,zm', 'as' => 'zm.'], function(){
    Route::get('view_case/{id}', 'ZmController@view_case')->name('view_case');
    Route::post('update/{id}', 'ZmController@update')->name('update');
    Route::get('case/{id}', 'ZmController@case')->name('case');
    Route::get('case_lists', 'ZmController@case_lists')->name('case_lists');
    Route::get('my_cases', 'ZmController@my_cases')->name('my_cases');
    Route::get('generate-pdf/{id}','ZmController@generatePDF')->name('generate-pdf');
    Route::get('reject_case_lists', 'ZmController@reject_case_lists')->name('reject_case_lists');
    Route::get('fm_absents_check', 'ZmController@fm_absents_check')->name('fm_absents_check');
    //create case
    Route::get('create_case', 'ZmController@create_case')->name('create_case');
    Route::post('show', 'ZmController@show')->name('show');
    Route::post('designation_show', 'ZmController@designation_show')->name('designation_show');
    Route::post('store', 'ZmController@store')->name('store');
    Route::post('rejected_case_check', 'ZmController@rejected_case_check')->name('rejected_case_check');
    //Document Download
    
    Route::get('download_documents/{id}','ZmController@download_documents')->name('download_documents'); 
    Route::get('retention_documents/{id}','ZmController@retention_documents')->name('retention_documents');    
    // FM Absents Route
    Route::get('zm_escalation_record', 'ZmController@zm_escalation_record')->name('zm_escalation_record');
    Route::post('zm_absents', 'ZmController@zm_absents')->name('zm_absents');
    Route::post('dr_detail', 'ZmController@dr_detail')->name('dr_detail'); 
    Route::post('dr_name', 'ZmController@dr_name')->name('dr_name'); 
    //NSM Case
    Route::get('nsm_case_lists', 'ZmController@nsm_case_lists')->name('nsm_case_lists');
    Route::get('nsm_case/{id}', 'ZmController@nsm_case')->name('nsm_case');
    Route::post('update_nsm/{id}', 'ZmController@update_nsm')->name('update_nsm');
});

// NSM Route
Route::group(['prefix' => 'nsm',  'middleware' => 'auth',  'middleware' => 'role:admin,nsm', 'as' => 'nsm.'], function(){
    Route::get('view_case/{id}', 'NsmController@view_case')->name('view_case');
    Route::post('update/{id}', 'NsmController@update')->name('update');
    Route::get('case/{id}', 'NsmController@case')->name('case');
    Route::get('case_lists', 'NsmController@case_lists')->name('case_lists');
    Route::get('my_cases', 'NsmController@my_cases')->name('my_cases');
    Route::get('generate-pdf/{id}','NsmController@generatePDF')->name('generate-pdf');
    Route::get('reject_case_lists', 'NsmController@reject_case_lists')->name('reject_case_lists');
    //Document Download
    
    Route::get('download_documents/{id}','NsmController@download_documents')->name('download_documents'); 
    Route::get('retention_documents/{id}','NsmController@retention_documents')->name('retention_documents');    
    // ZM Absents Route
    Route::get('nsm_escalation_record', 'NsmController@nsm_escalation_record')->name('nsm_escalation_record');
    Route::post('nsm_absents', 'NsmController@nsm_absents')->name('nsm_absents');
});

// PM Route
Route::group(['prefix' => 'pm',  'middleware' => 'auth',  'middleware' => 'role:admin,pm', 'as' => 'pm.'], function(){
    Route::get('view_case/{id}', 'PmController@view_case')->name('view_case');
    Route::post('update/{id}', 'PmController@update')->name('update');
    Route::get('case/{id}', 'PmController@case')->name('case');
    Route::get('case_lists', 'PmController@case_lists')->name('case_lists');
    Route::get('approved_case_lists', 'PmController@approved_case_lists')->name('approved_case_lists');
    Route::get('generate-pdf/{id}','PmController@generatePDF')->name('generate-pdf');
    Route::get('reject_case_lists', 'PmController@reject_case_lists')->name('reject_case_lists');
    Route::get('/download-doc/{id}','PmController@show')->name('download-doc');
    //Document Download
    
    Route::get('download_documents/{id}','PmController@download_documents')->name('download_documents'); 
    Route::get('retention_documents/{id}','PmController@retention_documents')->name('retention_documents');
});
