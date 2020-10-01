@extends('layouts.base')

@section('title', 'Edit employee: ' . $employee->name)

@section('content')

    <h1>Edit {{$employee->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
