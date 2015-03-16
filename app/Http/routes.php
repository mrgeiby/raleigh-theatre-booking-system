<?php
use App\Performance;
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
Route::get('/about', 'HomeController@about');
Route::get('/schedule', 'HomeController@schedule');

Route::get('home', 'HomeController@index');

Route::group(array('prefix' => 'customer', 'middleware' => ['auth', 'roles'], 'roles' => ['customer']), function () {
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
    Route::get('/{id}/edit', [
        'uses' => 'ProductionTypeController@edit',
    ]);
    Route::post('/update', [
        'uses' => 'ProductionTypeController@update',
    ]);
    Route::get('/{id}/destroy', [
        'uses' => 'ProductionTypeController@destroy',
    ]);
});

Route::group(array('prefix' => 'productions', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator', 'manager']), function () {
    Route::get('/create', [
        'uses' => 'ProductionController@create',
    ]);
    Route::post('/store', [
        'uses' => 'ProductionController@store',
    ]);
    Route::get('/{slug}/edit', [
        'uses' => 'ProductionController@edit',
    ]);
    Route::post('/update', [
        'uses' => 'ProductionController@update',
    ]);
    Route::get('/{slug}/destroy', [
        'uses' => 'ProductionController@destroy',
    ]);
    Route::get('/manage', [
        'uses' => 'ProductionController@manage',
    ]);
});

Route::group(array('prefix' => 'productions'), function () {
    Route::get('/', [
        'uses' => 'ProductionController@index',
    ]);
    Route::get('/{slug}', 'ProductionController@show');
    Route::get('/search/{searchTerm}', [
        'uses' => 'ProductionController@search',
    ]);

});

Route::group(array('prefix' => 'performances', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator', 'manager']), function () {
    Route::get('/', [
        'uses' => 'PerformanceController@index',
    ]);
    Route::get('/create', [
        'uses' => 'PerformanceController@create',
    ]);
    Route::post('/store', [
        'uses' => 'PerformanceController@store',
    ]);
    Route::get('/{id}/edit', [
        'uses' => 'PerformanceController@edit'
    ]);
    Route::post('/update', [
        'uses' => 'PerformanceController@update'
    ]);
    Route::get('/{id}/destroy', [
        'uses' => 'PerformanceController@destroy'
    ]);
});

Route::group(array('prefix' => 'users', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator', 'manager']), function () {
    Route::get('/', [
        'uses' => 'UserController@index',
    ]);
    Route::get('/create', [
        'uses' => 'UserController@create',
    ]);
    Route::post('/store', [
        'uses' => 'UserController@store',
    ]);
    Route::get('/{id}/edit', [
        'uses' => 'UserController@edit',
    ]);
    Route::post('/update', [
        'uses' => 'UserController@update',
    ]);
    Route::get('/{id}/destroy', [
        'uses' => 'UserController@destroy'
    ]);
});

Route::group(array('prefix' => 'roles', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator', 'manager']), function () {
    Route::get('/', [
        'uses' => 'RoleController@index',
    ]);
    Route::get('/create', [
        'uses' => 'RoleController@create',
    ]);
    Route::post('/store', [
        'uses' => 'RoleController@store',
    ]);
    Route::get('/{id}/edit', [
        'uses' => 'RoleController@edit'
    ]);
    Route::post('/update', [
        'uses' => 'RoleController@update'
    ]);
    Route::get('/{id}/destroy', [
        'uses' => 'RoleController@destroy'
    ]);
});

Route::group(array('prefix' => 'basket'), function () {
    Route::get('/', [
        'uses' => 'BasketController@index',
    ]);
    Route::get('{id}/add', function($id) {
        $performance = Performance::find($id);
        Cart::associate('App\Performance')->add($id,$performance->perfName, 1, 4.99);
        return redirect('basket/');
    });
    Route::get('{id}/remove', function($rowID) {
        Cart::remove($rowID);
        return redirect('basket/');
    });

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
