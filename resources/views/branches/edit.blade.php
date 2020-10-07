@extends('layouts.base')

@section('title', 'Edit branch: ' . $branch->name)

@section('content')

    <h1>Edit {{$branch->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($branch, array('route' => array('branches.update', $branch->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('location', 'Location') }}
        {{ Form::text('location', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update Branch', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
