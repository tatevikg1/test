@extends('layouts.app')
@section('title', 'Quiz')

@section('content')

<div class="container">
    <div class="row"> 
        @foreach ($topics as $topic)

            <div class="m-4 p-4 topic" 
                 style="width:200px;background-color: #f7f7f7; border: 1px solid grey; border-radius: 10px;">

                <p>{{ ucfirst($topic->title) }}</p>
                <a href="/tests/{{ $topic->id }}-{{Str::slug($topic->title)}}" class="btn btn-dark"> 
                    {{__('trans.pass_test')}}
                </a>
            </div>
        @endforeach
    </div>

    <div>
        {{ $topics->links() }}
    </div>
</div>

@endsection
