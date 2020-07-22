<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class HomeController extends Controller
{

    public function index()
    {
        $topics = Topic::all();

        return view('test.index', compact('topics'));
    }
}
