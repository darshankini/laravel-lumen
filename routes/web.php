<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user-profile', 'AuthController@me');
    $router->group(['middleware' => 'ip'], function () use ($router) {
        Route::post('addUser', 'UserController@add');
        $router->group(['middleware' => 'putdata'], function () use ($router) {
            Route::put('updateUser/{id}', 'UserController@update');
        });
    });
});

