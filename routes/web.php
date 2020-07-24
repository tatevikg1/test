<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get ('/tests',               'TestController@index');
Route::get ('/tests/{topic}-{slug}', 'TestController@show');
Route::post('/tests/{topic}-{slug}', 'TestController@store');

Route::get('/results/{test}',   'ResultController@show')->name('result.show');
Route::get('/results',          'ResultController@index')->name('result.index');
