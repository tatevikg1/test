<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Test;
use App\Topic;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @var App\User $user
     * @var App\Topic $topics
    */
    public function index()
    {
        $user = Auth::user();

        $topics = Topic::all();

        return view('result.index', compact('user', 'topics'));
    }

    /**
     * @param App\Test $test
     * @return view
    */
    public function show($language, Test $test)
    {
        $users_score = 0;
        $total_points = 0;

        foreach ($test->testAnswers as $testAnswer) {
            if ($testAnswer->questionsOption->correct == 0)
            {
                $testAnswer->correct = 0;
                $testAnswer->save();
            }
            else{
                $testAnswer->correct = 1;
                $testAnswer->save();
                $users_score += $testAnswer->question->point;
            }
            $total_points += $testAnswer->question->point;
        }

        $topic = $test->topic;

        //$questions = Question::select('id')->where('topic_id', $topic->id)->pluck('id')->toArray();

        $score = ($users_score * 100)/$total_points;
        $score = number_format((float)$score, 2);

        $user = $test->user;

        $test->update(['score' => (int)$score]);

        return view('result.show', compact('test', 'user'));
    }

}
