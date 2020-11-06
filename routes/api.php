<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');

    //tasks
    Route::get('list-task', 'Api\TaskController@index');
    Route::get('delete-task/{id}', 'Api\TaskController@destroy');
    Route::get('search/{key}', 'Api\TaskController@search');
    Route::get('task/{id}', 'Api\TaskController@show');
    Route::post('update-task/{id}', 'Api\TaskController@update');
    Route::post('create-task', 'Api\TaskController@store');
});

Route::resource('/test', 'Api\HomeController');
Route::resource('/task', 'Api\TaskController');


