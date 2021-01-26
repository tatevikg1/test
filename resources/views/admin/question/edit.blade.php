@extends('layouts.app')
@section('title', 'Admin Question')
@section('content')

<div class="container">
    <div>Test title - {{ $topic->title }}</div>
    

    <form  action="{{ route('admin.question.update', ['topic' => $topic->id]) }}"  method="post">
        @csrf
        @method['patch']
        <input type="text" placeholder="question" name="question">
        <input type="number" name="point" value="1">

        <input type="submit" placeholder="Create question" class="btn btn-primary">
    </form>

</div>

@endsection
