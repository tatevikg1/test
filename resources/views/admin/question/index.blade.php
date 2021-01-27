@extends('layouts.app')
@section('title', 'Admin Question')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header justify-content-between d-flex ">
                    <h4>{{ $topic->title }}</h4>
                    <a href="{{ route('admin.question.create', ['topic' => $topic->id]) }}" class="btn btn-secondary" id="add">Add</a>
                </div>

                <questions  ref="qeustions" topic="{{ $topic->id }}"></questions>
            </div>
        </div>
    </div>
</div>

@endsection
