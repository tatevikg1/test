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
                    <p>{{__('trans.dear')}} {{ $user->name }} {{__('trans.your_score_is')}} {{ $test->score }}%.</p>
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
                            <div class="card-header text-danger">{{__('trans.wrong_answer')}} ({{ $testAnswer->question->point }} point(s))</div>
                        @else
                            <div class="card-header text-success">{{__('trans.correct_answer')}} ({{ $testAnswer->question->point }} point(s))</div>
                        @endif

                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    @else
        <div class="container">
            {{__('trans.invalid_test_number')}}
            Invalid test number.
        </div>
    @endif
</div>
@endsection
