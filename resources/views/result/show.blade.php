@extends('layouts.app')

@section('content')
<div class="container">
    @if($user->id == Auth::user()->id)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $test->topic->title }}</div>
                </div>
                <div class="container">
                    <p>Dear {{ $user->name }} your score is {{ $test->score }}%.</p>
                </div>

                <div class="container">
                    @foreach ($test->testAnswers as $key=>$testAnswer)

                    <div class="card mb-3">
                        <div class="card-header">
                            <strong class="mr-4">{{ $key+1 }}</strong>
                            {{ $testAnswer->question->question }}
                        </div>
                        <div class="card-header">
                            {{ $testAnswer->questionsOption->option }}
                        </div>

                        @if( $testAnswer->correct == 0)
                            <div class="card-header text-danger">Wrong Answer ({{ $testAnswer->question->point }} point(s))</div>
                        @else
                            <div class="card-header text-success">Correct Answer ({{ $testAnswer->question->point }} point(s))</div>
                        @endif

                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    @else
        <div class="">
            You are not authorized to see this pages content.
        </div>

    @endif
</div>
@endsection
