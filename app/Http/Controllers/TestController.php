<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Topic;
use App\Test;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'second.time']);
    }

    public function index()
    {
        $topics = Topic::all();

        return view('test.index', compact('topics'));
    }

    /**  
     * @param  App\Topic  $topic
     * @param string $slug
     * @return view
     */
    public function show(Topic $topic, $slug)
    {
        $topic->load(['questions.questions_options' => function($query)
        {
            $query->orderBy('questions_options', 'asc');
        }]);

        return view('test.show', compact('topic'));
    }

    /**  
     * @param App\Topic  $topic
     * @param App\Http\Requests\TestRequest $request
     * @return view
     */
    public function store(Topic $topic, TestRequest $request)
    {
        // $data = request()->validate([
        //     'responses.*.questions_option_id'=>'required',
        //     'responses.*.question_id'=>'required',
        //     //'responses.*.point'=>'required',
        // ]);
        //
        $data = $request->all();

        $test = new Test;
        $test->user_id = Auth::user()->id;
        $test->topic_id = $topic->id;
        $test->save();

        $test->testAnswers()->createMany($data['responses']);

        //$t->load('testAnswers.questionsOption');

        return redirect()->route('result.show', [$test->id]);

    }

}
