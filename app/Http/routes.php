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

    //AS 是命名路由
    Route::get('show/{uid?}', ['as' => 'show2', 'uses' => 'UserController@show'] );


//    Route::get('profile/update', 'UserController@updateProfile');

    Route::get('profile/{uid}', 'UserController@profile');
    Route::get('profile/{uid}/set/nickname', 'UserController@profileSetNickname');


    Route::get('address/{uid}', 'UserController@address');

    Route::get('bodys/{uid}', 'UserController@bodys');

    Route::get('invoices/{uid}', 'UserController@invoices');

    Route::get('profile/update/avatar', 'UserController@updateAvatar');

    Route::post('profile/update/avatar/set', 'UserController@updateAvatar2');

    Route::match(['get', 'post'], 'profile/update/password', 'UserController@updatePassword');

    Route::match(['get', 'post'], 'post/thread', 'UserController@postThread');

});

Route::group(['prefix' => 'posts'], function () {
    Route::get('update/{id}', 'PostController@update');
    Route::get('update_2/{id}', 'PostController@update_2');
    Route::get('update_3/{id}', 'PostController@update_3');



});


Route::group(['prefix' => 'cache'], function () {
    Route::get('cache_1', 'CacheController@cache_1');


});


Route::group(['prefix' => 'study'], function () {
    Route::get('collect_1', 'StudyController@collect_1');
    Route::get('store/secret', 'StudyController@storeSecret');
    Route::get('array/helper', 'StudyController@arrayHelper');
    Route::get('function/helper', 'StudyController@funHelper');
    Route::get('time',  'StudyController@time' );


    Route::get('pages',  'StudyController@pages' );

    Route::get('sessions', 'StudyController@sessions');
});

Route::group(['prefix' => 'posts'], function () {

    Route::get('country/{id}', 'PostsController@country');
});

//任务管理
Route::group(['prefix' => 'task'], function () {
    Route::get('/index', 'TaskController@index');
    Route::get('/index2', 'TaskController@index2');

    Route::match(['get', 'post'], '/add', 'TaskController@add');

    Route::delete('/delete/{id}', 'TaskController@delete');

    Route::delete('/destroy/{id}', 'TaskController@destroy');

    Route::delete('/destroy2/{id}', 'TaskController@destroy_2');

    Route::match(['get', 'post'], '/edit/{id}', 'TaskController@edit');
});







Route::auth();

Route::get('/home', 'HomeController@index');
