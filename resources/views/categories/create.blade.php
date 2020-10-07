@extends('layouts.base')

@section('title', 'Add New Category')

@section('content')

    <h1>Add Category</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'categories')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save Category', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
