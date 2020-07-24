<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Question;
use App\Topic;
use App\User;
use App\Test;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Question::deleting(function ($question) {
            $question->questions_options()->delete();
        });

        Topic::deleting(function ($topic) {
            $questions = $topic->questions()->get();
            foreach ($questions as $question) {
                $question->questions_options()->delete();
            }
            $topic->questions()->delete();
        });

        Test::deleting(function ($test) {
            $test->testAnswers()->delete();
        });

        User::deleting(function ($user) {
            $tests = $user->tests()->get();
            foreach ($tests as $test) {
                $test->testAnswers()->delete();
            }
            $user->tests()->delete();
        });

    }
}
