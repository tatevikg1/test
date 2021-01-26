<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get ('/tests',               'TestController@index');
Route::get ('/tests/{topic}-{slug}', 'TestController@show')->middleware('second.time');
Route::post('/tests/{topic}-{slug}', 'TestController@store');

Route::get('/results/{test}',   'ResultController@show')->name('result.show');
Route::get('/results',          'ResultController@index')->name('result.index');

Route::get('/secondTime', function () {
    return view('messages.secondTime');
});


Route::prefix('admin')->group(function () {
    Route::get      ('/topic',          'Admin\TopicController@index')  ->name('admin.topic.index');
    Route::post     ('/topic',          'Admin\TopicController@store')  ->name('admin.topic.store');
    Route::delete   ('/topic/{topic}',  'Admin\TopicController@destroy')->name('admin.topic.destroy');

    Route::get      ('/{topic}/question',       'Admin\QuestionController@index')  ->name('admin.question.index');
    Route::get      ('/question/create',        'Admin\QuestionController@create') ->name('admin.question.create');
    Route::post     ('/question/{topic}',       'Admin\QuestionController@store')  ->name('admin.question.store');
    Route::delete   ('/question/{question}',    'Admin\QuestionController@destroy')->name('admin.question.destroy');
    Route::get      ('/question/{question}/edit','Admin\QuestionController@edit') ->name('admin.question.edit');
    Route::patch    ('/question/{question}',    'Admin\QuestionController@update') ->name('admin.question.update');
});