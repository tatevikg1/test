@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 style="text-align:center">All tests</h4>
                </div>

                <div class="table-responsive">
                    <table class="table-striped table">
                        @foreach ($topics as $topic)
                            <tr style="padding:0px; margin:0px;">
                                <td style="padding:0px; margin:0px;">
                                    <p class="ml-3">{{ ucfirst($topic->title) }}</p>
                                </td>
                                <td style="padding:0px; margin:0px;">
                                    <a href="/tests/{{ $topic->id }}-{{ Str::slug($topic->title) }}"
                                    class="btn btn-dark"
                                    style="float:right"> Pass test</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div style="padding-left:35%">
                        {{ $topics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
