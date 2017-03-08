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



Route::get('/', 'Frontend\FrontendController@index');

Auth::routes();



Route::group(['middleware' => 'auth', 'as'=> 'admin.', 'prefix'=> 'admin'], function(){
    
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');
    Route::get('/user/profile/{id?}', 'Backend\UsersController@profile')->name('profile');

    Route::group(['as'=> 'users.', 'prefix'=> 'users'], function(){
        Route::get('/', 'Backend\UsersController@index')->name('index');
    });

});
