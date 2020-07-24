<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class HomeController extends Controller
{

    public function index()
    {
        $topics = Topic::paginate(7);

        return view('test.index', compact('topics'));
    }
}
