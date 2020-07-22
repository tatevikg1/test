<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'TopicController@index')->name('home');

Route::get('/topics', 'TopicController@index');

Route::get('/test/{topic}-{slug}', 'TestController@show');
Route::post('/test/{topic}-{slug}', 'TestController@store');

Route::get('/results/{test}', 'ResultController@show')->name('result.show');
Route::get('/results', 'ResultController@index')->name('result.index');
