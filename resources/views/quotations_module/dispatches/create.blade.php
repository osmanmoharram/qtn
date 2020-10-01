@extends('layouts.base')

@section('title', 'Add New Dispatch Request')

@section('content')

    <h1>Add Dispatch Request</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'dispatches')) }}

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
