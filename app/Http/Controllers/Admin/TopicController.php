<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();

        return view('admin.topic.index', compact('topics'));
    }

    public function store(Request $request)
    {

        try {
            Topic::create([  'title' => $request['topic'], ]);

        } catch (\Exception $e) {
    
            return response($e->getMessage(), 422)->header('Content-Type', 'text/plain');
        }
        return response('Topic was added', 200)->header('Content-Type', 'text/plain');
    }

    public function destroy(Topic $topic)
    {
        return $topic->delete();
    }
}
