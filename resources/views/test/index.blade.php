@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="">All tests</h4>
                </div>


                <div class="card-body" >
                    <ol class="list-group ml-4">
                        @foreach($topics as $topic)
                            <div class="list-item" style="background-color:#eee; margin:10px;">
                                <li class="list-group_item">
                                    <span class="ml-3">{{ $topic->title }}</span>
                                    <a href="/tests/{{ $topic->id }}-{{ Str::slug($topic->title) }}"
                                        class="btn btn-dark"
                                        style="float:right"> Pass test</a>
                                </li>
                            </div>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
