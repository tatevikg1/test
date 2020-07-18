@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $topic->title }}</div>
            </div>
            <form class="" action="/test/{{ $topic->id }}-{{ Str::slug($topic->title) }}" method="post">
                @csrf

                @foreach($topic->questions as $key=>$question)
                    <div class="card mt-4">
                        <div class="card-header"><strong class="mr-4">{{ $key+1 }}</strong>{{ $question->question  }}</div>

                        <div class="card-body">
                            @error('responses.'.$key.'.questions_option_id')
                                <small style="color:red">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->questions_options as $questions_option)
                                    <label for="questions_option{{ $questions_option->id }}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{ $key }}][questions_option_id]"
                                                value="{{ $questions_option->id }}" class="mr-2" id="questions_option{{ $questions_option->id }}"
                                                {{ (old('responses.'.$key.'.questions_option_id') == $questions_option->id) ? 'checked' : ''}}>
                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                            {{ $questions_option->option }}
                                        </li>
                                    </label>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                @endforeach

                <input type="submit" class="btn btn-dark" value='Submit Answers'>
            </form>

        </div>
    </div>
</div>
@endsection