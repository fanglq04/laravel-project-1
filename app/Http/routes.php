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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('lists', 'UserController@lists');

    Route::get('show/{uid}', 'UserController@show');

    Route::get('profile/{uid}', 'UserController@profile');

    Route::get('address/{uid}', 'UserController@address');

    Route::get('bodys/{uid}', 'UserController@bodys');

    Route::get('invoices/{uid}', 'UserController@invoices');

});


Route::group(['prefix' => 'posts'], function () {

    Route::get('country/{id}', 'PostsController@country');
});