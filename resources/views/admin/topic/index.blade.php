@extends('layouts.app')
@section('title', 'Admin Topics')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header justify-content-between d-flex ">
                    <h4>{{ __('Topics') }}</h4>
                    <div class="btn btn-secondary" id="add">Add</div>
                </div>

                <topics-table  ref="topics"></topics-table>
            </div>
        </div>
    </div>
</div>

@include('admin.topic._addTopicForm')

@endsection
