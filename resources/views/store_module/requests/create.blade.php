@extends('layouts.base')

@section('title', 'Create New RFP')

@section('content')

    <h1>New Request for Proposal</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'requests')) }}

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
