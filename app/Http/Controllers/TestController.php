<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        $topics = Topic::all();

        return view('test.index', compact('topics'));
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
            'responses.*.questions_option_id'=>'required',
            'responses.*.question_id'=>'required',
            //'responses.*.point'=>'required',
        ]);


        $test = new Test;
        $test->user_id = Auth::user()->id;
        $test->topic_id = $topic->id;
        $test->save();

        $test->testAnswers()->createMany($data['responses']);

        //$t->load('testAnswers.questionsOption');

        return redirect()->route('result.show', [$test->id]);

    }

}
