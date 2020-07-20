@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $t->topic->title }}</div>
            </div>
            <div class="container">
                <p>Dear {{ $user->name }} your score is {{ $score }}%</p>
            </div>

            <div class="container">
                @foreach ($t->testAnswers as $testAnswer)

                <div class="card mb-3">
                    <div class="card-header">
                        {{ $testAnswer->question }}
                    </div>
                    <div class="card-header">
                        {{ $testAnswer->questions_option }}
                    </div>

                    @if( $testAnswer->point == 0)
                        <div class="card-header text-danger">Wrong Answer</div>
                    @else
                        <div class="card-header text-success">Correct Answer</div>
                    @endif

                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
