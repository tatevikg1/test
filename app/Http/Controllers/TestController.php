<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Topic;
use App\Test;
use App\User;
use App\Question;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Topic $topic, $slug)
    {
        //$quiz->load('questions.answers');

        $topic->load(['questions.questions_options' => function($query)
        {
            $query->orderBy('questions_options', 'asc');
        }]);

        return view('test.show', compact('topic'));
    }

    public function store(Topic $topic, Test $test, User $user)
    {
        $data = request()->validate([
            'responses.*.questions_option'=>'required',
            'responses.*.question'=>'required',
            'responses.*.point'=>'required',
        ]);

        $t = new Test;
        $t->user_id = Auth::user()->id;
        $t->topic_id = $topic->id;
        $t->save();

        $t->testAnswers()->createMany($data['responses']);

        $users_score = DB::table('test_answers')->where('test_id', $t->id)->sum('point');

        $questions = Question::select('id')->where('topic_id', $topic->id)->pluck('id')->toArray();

        $total_score = DB::table('questions_options')->whereIn('question_id', $questions)->sum('point');

        $score = ($users_score * 100)/$total_score;

        $user = Auth::user();

        return view('result.show', compact('t', 'topic', 'user', 'score'));
    }
}
