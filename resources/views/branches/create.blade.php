@extends('layouts.base')

@section('title', 'Add New Branch')

@section('content')

    <h1>Add Branch</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'branches')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('location', 'Location') }}
        {{ Form::text('location', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save Branch', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
