@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <small>Dear {{ $user->name }} so far your have completesmall {{ $user->tests->count() }} tests (limit is 10).</p>
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
                            <th>Topic title</th>
                            <th>Date</th>
                            <th>Score</th>
                        </tr>

                        <?php $count = 0; ?>
                        @foreach ($user->tests->reverse() as $key=>$test)
                            <?php if($count == 10) break; ?>

                            <tr data-toggle="tooltip" title="click on topic title to see more detales">
                                <td><a style="color:black" href="/results/{{ $test->id }}">{{ ucfirst($topics[$test->topic_id]->title) }}</a></td>
                                <td>{{ $test->created_at }}</td>
                                <td>{{ $test->score }}%</td>
                            </tr>

                            <?php $count++; ?>
                        @endforeach

                    </table>
                </div>
            @else
                <div class="">
                    You haven't pasted any test.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
