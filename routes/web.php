<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get ('/tests',                'TestController@index')->name('test.index');
Route::get ('/tests/{topic}-{slug}', 'TestController@show') ->name('test.show');
Route::post('/tests/{topic}-{slug}', 'TestController@store')->name('test.store');

Route::get('/results/{test}',        'ResultController@show') ->name('result.show');
Route::get('/results',               'ResultController@index')->name('result.index');

Route::get('/secondTime', function () { return view('messages.secondTime'); });
// Route::get ('/tests/{topic}-{slug}', 'TestController@show')->middleware('second.time');


Route::prefix('admin')->group(function () {
    Route::get      ('/topic',          'Admin\TopicController@index')  ->name('admin.topic.index');
    Route::post     ('/topic',          'Admin\TopicController@store')  ->name('admin.topic.store');
    Route::delete   ('/topic/{topic}',  'Admin\TopicController@destroy')->name('admin.topic.destroy');

    Route::get      ('/question/create',        'Admin\QuestionController@create') ->name('admin.question.create');
    Route::get      ('/question/{topic}',       'Admin\QuestionController@index')  ->name('admin.question.index');
    Route::post     ('/question/{topic}',       'Admin\QuestionController@store')  ->name('admin.question.store');
    Route::delete   ('/question/{question}',    'Admin\QuestionController@destroy')->name('admin.question.destroy');
    Route::get      ('/question/{question}/edit','Admin\QuestionController@edit')  ->name('admin.question.edit');
    Route::patch    ('/question/{question}',    'Admin\QuestionController@update') ->name('admin.question.update');
});