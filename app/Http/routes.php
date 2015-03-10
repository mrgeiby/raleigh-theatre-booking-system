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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::group(array('prefix' => 'customer'), function () {
    Route::get('show', 'CustomerController@show');
    Route::get('edit', 'CustomerController@edit');
    Route::post('update', 'CustomerController@update');

});

Route::group(array('prefix' => 'productionTypes', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator', 'manager']), function () {
    Route::get('/', [
        'uses' => 'ProductionTypeController@index',
    ]);
    Route::get('/create', [
        'uses' => 'ProductionTypeController@create',
    ]);
    Route::post('/store', [
        'uses' => 'ProductionTypeController@store',
    ]);
//    Route::get('/{slug}/edit', [
//        'uses' => 'ProductionController@edit',
//    ]);
//    Route::get('/{slug}/destroy', [
//        'uses' => 'ProductionController@destroy',
//    ]);
//    Route::post('/update', [
//        'uses' => 'ProductionController@update',
//    ]);
});

Route::group(array('prefix' => 'productions', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator', 'manager']), function () {
    Route::get('/create', [
        'uses' => 'ProductionController@create',
    ]);
    Route::post('/store', [
        'uses' => 'ProductionController@store',
    ]);
    Route::post('/update', [
        'uses' => 'ProductionController@update',
    ]);
    Route::get('/{slug}/edit', [
        'uses' => 'ProductionController@edit',
    ]);
    Route::get('/{slug}/destroy', [
        'uses' => 'ProductionController@destroy',
    ]);
});

Route::group(array('prefix' => 'productions'), function () {
    Route::get('/', [
        'uses' => 'ProductionController@index',
    ]);
    Route::get('/{slug}', 'ProductionController@show');

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
