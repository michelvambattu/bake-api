<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});



//Login
Route::post('login', 'AuthApiController@login');
Route::post('logout', 'AuthApiController@logout');

//Register
Route::post('register', 'RegisterApiController@register');



Route::group([
    'middleware' =>  'auth'

], function ($router) {
   
    Route::post('logout', 'AuthApiController@logout');
    
    
    //Home
    Route::group([
        'prefix'    => 'home'
    
    ], function ($router) {
        Route::post('/', 'HomeApiController@index');
    });
});

    
   

