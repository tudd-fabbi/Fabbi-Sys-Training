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
});

Route::resource('/test', 'Api\HomeController');
Route::resource('/tasks', 'Api\TaskController');
Route::get('/subject/list','Api\SubjectController@index');
Route::get('/subject/add','Api\SubjectController@store');
Route::resource('/course', 'Api\CourseController');


Route::get('/course', 'Api\CourseController@index');
Route::resource('/subjects','Api\SubjectController');
Route::get('/subjects/count/{id}','Api\SubjectController@countTaskCourseSubjectById');
Route::get('/subjects/courses/{id}','Api\SubjectController@ListCourseBySubjetID');

Route::resource('user','Api\UserController');
