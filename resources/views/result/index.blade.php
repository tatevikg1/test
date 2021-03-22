@extends('layouts.app')
@section('title', 'Quiz Results')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <div>{{__('trans.dear')}} {{ $user->name }} {{__('trans.so_far_you_have_completed')}} {{ $user->tests->count() }} tests.</div>
            </div>

            <script>
                $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();
                });
            </script>

            @if($user->tests->count() > 0)
                <div class="table-responsive">
                    <table class="table-striped table">
                        <tr>
                            <th>{{__('trans.topic_title')}}</th>
                            <th>{{__('trans.date')}}</th>
                            <th>{{__('trans.score')}}</th>
                        </tr>

                        <?php $count = 0; ?>
                        @foreach ($user->tests->reverse() as $key=>$test)
                            @if($count < 10)

                            <tr data-toggle="tooltip" title="click on topic title to see more detales">
                                <td><a style="color:black" href="{{ route('result.show',['language' => app()->getLocale(), 'test' => $test->id]) }}">{{ ucfirst($topics[$key]->title) }}</a></td>
                                <td>{{ $test->created_at }}</td>
                                <td>{{ $test->score }}%</td>
                            </tr>

                            <?php $count++; ?>
                            @endif
                        @endforeach

                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
