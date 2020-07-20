@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $t->topic->title }}</div>
            </div>
            <div class="container">
                <p>Dear {{ $user->name }} </p>
            </div>

            <div class="container">
                @foreach ($t->testAnswers as $testAnswer)

                    {{ $testAnswer->question_id }}

                @endforeach

            </div>



        </div>
    </div>
</div>
@endsection
