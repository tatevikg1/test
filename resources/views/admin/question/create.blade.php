@extends('layouts.app')
@section('title', 'Admin Question')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex">
                <div>Test title - {{ $topic->title }}</div>
            </div>
        </div>
        <div class="card-body">
            <form  action="{{ route('admin.question.store', ['topic' => $topic->id]) }}"  method="post">
                @csrf
                <div class="list-group">
                    <input type="text" placeholder="question" name="question" value="{{ old('question') }}" min="1" class="@error('question') is-invalid @enderror">
                    @error('question')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="list-group">
                    <input type="text" name="point" value="{{ old('point') ?? '1' }}">
                    @error('point')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <options></options>
                <input type="submit" placeholder="Create question" class="btn btn-secondary" value="Add">
            </form>
            </div>
        </div>
    

    
    </div>


</div>

@endsection
