@extends('layouts.base')

@section('title', 'Add New Department')

@section('content')

    <h1>Add Department</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'departments')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save Department', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
