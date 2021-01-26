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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/get-topics', function(){ 
    return App\Topic::all(); 
});

Route::post('/admin/get-questions/{topic}', function(App\Topic $topic){ 
    return App\Question::where('topic_id', $topic->id)->get();
});

Route::post('/admin/get-options/{question}', function(App\Question $question){
    return App\QuestionsOption::where('question_id', $question->id)->get();
});
