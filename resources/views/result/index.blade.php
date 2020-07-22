@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="font-italic font-weight-bold">
                <p>Dear {{ $user->name }} so far your have completed {{ $user->tests->count() }} tests (only 10 are avalible to see).</p>
            </div>

            <script>
                $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();
                });
            </script>

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
                        <td><a style="color:black" href="/results/{{ $test->id }}">{{ $test->topic->title }}</a></td>
                        <td>{{ $test->created_at }}</td>
                        <td>{{ $test->score }}%</td>
                    </tr>
                    <?php $count++; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
