@extends('layouts.base')

@section('title', 'Create New Proposal')

@section('content')

    <h1>Create New Proposal</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'proposals')) }}

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
