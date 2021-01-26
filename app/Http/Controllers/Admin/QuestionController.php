<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    public function index(Topic $topic)
    {
        return view('admin.question.index', compact('topic'));
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'topic_id'=> $request['topic'],
            'question' => $request['question'],
            'point' => $request['point'],
        ]);

        foreach($request['options'] as $index => $option){
            $qo = $question->questions_options()->create([
                'option' => $option,
            ]);
            if($request->correct == $index){
                $qo->update(['correct' => '1']);
            }
        }

        return redirect()->route('admin.question.index', ['topic' => $request['topic']]);
    }

    public function edit(Question $question)
    {

    }

    public function update()
    {

    }

    public function create(Request $request)
    {
        $topic = Topic::where('id', $request->topic)->first();

        return view('admin.question.create', compact('topic'));
    }

    public function destroy(Question $question)
    {
        return $question->delete();
    }
}
