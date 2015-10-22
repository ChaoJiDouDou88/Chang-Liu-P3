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

/*
This is For Log Vierer service
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lorem-ipsum', 'LoremIpsumController@getCreate');
Route::post('/lorem-ipsum', 'LoremIpsumController@postCreate');
Route::get('/user-generator', 'UserGenerator@getCreate');
Route::post('/user-generator', 'UserGenerator@postCreate');
Route::get('/xkcd-generator', 'XkcdGenerator@getCreate');
Route::post('/xkcd-generator', 'XkcdGenerator@postCreate');
