@extends('layouts.base')

@section('title', 'Upload Employees')

@section('content')

    <h1>Upload Employees</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'employees/upload', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('employees', 'CSV File') }}
        {{ Form::file('employees', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Upload Employees', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
