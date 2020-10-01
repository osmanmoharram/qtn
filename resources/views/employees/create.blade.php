@extends('layouts.base')

@section('title', 'Add New Employee')

@section('content')

    <h1>Add Employee</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'employees')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
