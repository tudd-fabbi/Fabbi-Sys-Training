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
Route::resource('getData', 'apiSubjectController');
Route::delete('/deleteSubject/{id}', 'apiSubjectController@destroy')->name('destroy');
Route::get('/searchSubject/{nameSubject}','apiSubjectController@search')->name('search');
Route::get('/allcourses', 'apiSubjectController@allCourse')->name('allCourse');
Route::post('/subjects','apiSubjectController@store')->name('store');
Route::get('/subject/list','Api\SubjectController@index');
Route::delete('delete/subject/{id}','Api\SubjectController@destroy');
Route::get('/subject/add','Api\SubjectController@store');

Route::get('/getsubjectbyid/{id}','Api\SubjectController@getSubjectById');
Route::get('/countTask/{id}','Api\SubjectController@countTaskById');
Route::get('/countCourse/{id}','Api\SubjectController@countCourseById');
Route::get('/countUser/{id}','Api\SubjectController@countUserById');
Route::get('/updateSubject','Api\SubjectController@update');
Route::get('/listCourse/{id}','Api\SubjectController@listCourse');
