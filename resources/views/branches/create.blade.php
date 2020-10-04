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

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
