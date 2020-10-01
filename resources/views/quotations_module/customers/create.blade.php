@extends('layouts.base')

@section('title', 'Add New Customer')

@section('content')

    <h1>Add Customer</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'customers')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
