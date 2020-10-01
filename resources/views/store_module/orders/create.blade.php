@extends('layouts.base')

@section('title', 'Create New Order')

@section('content')

    <h1>Create New Order</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'orders')) }}

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
