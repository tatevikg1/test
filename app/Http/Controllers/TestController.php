<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

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

    public function store(Topic $topic)
    {
        $data = request()->validate([
            'responses.*.questions_option_id'=>'required',
            'responses.*.question_id'=>'required',
        ]);

        return "thank you";
    }
}
