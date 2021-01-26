<?php

namespace App\Http\Controllers;

use App\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();

        return view('topic.index', compact('topics'));
    }
}
