@extends('layouts.base')

@section('title', 'Edit dispatch request no: ' . $dispatch->id)

@section('content')

    <h1>Edit dispatch request no #{{$dispatch->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($dispatch, array('route' => array('dispatches.update', $dispatch->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
