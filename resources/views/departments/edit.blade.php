@extends('layouts.base')

@section('title', 'Edit department: ' . $department->name)

@section('content')

    <h1>Edit {{$department->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($department, array('route' => array('departments.update', $department->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update Department', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
