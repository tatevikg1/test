<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Topic;
use App\Test;

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

    public function store(Topic $topic, Test $test)
    {


        $data = request()->validate([
            'responses.*.questions_option_id'=>'required',
            'responses.*.question_id'=>'required',
            'test.user_id'=>'required',
        ]);


        $test = new Test;
        $test->user_id = Auth::user()->id;
        $test->topic_id = $topic->id;
        $test->save();

        dd($test);


        $takequiz->responses()->createMany($data['responses']);


        return "thank you";
    }
}
