@extends('layouts.app')
@section('title', 'Admin Question')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header d-flex">
                    <div>Test title - {{ $question->topic_id }}</div>
                </div>
            </div>
        
        <div class="card-body">
            <form  method="POST" action="{{ route('admin.question.update', ['question' => $question->id]) }}">
                @csrf
                @method('PATCH')

                <div class="list-group">
                    <input type="text" placeholder="question" name="question" value="{{ $question->question }}" min="1" class="@error('question') is-invalid @enderror">
                    @error('question')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="list-group">
                    <input type="text" name="point" value="{{ $question->point }}">
                    @error('point')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <options></options>        
                
                <input type="submit" placeholder="Create question" class="btn btn-secondary" value="Update">
            </form>
        </div>
    </div>
</div>

@endsection
