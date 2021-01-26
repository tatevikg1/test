@extends('layouts.app')
@section('title', 'Admin Question')
@section('content')

<div class="container">
    <div>Test title - {{ $topic->title }}</div>
    

    <form  action="{{ route('admin.question.store', ['topic' => $topic->id]) }}"  method="post">
        @csrf
        <input type="text" placeholder="question" name="question">
        <input type="number" name="point" value="1">

        <options></options>
        <input type="submit" placeholder="Create question" class="btn btn-primary">
    </form>

</div>

@endsection
