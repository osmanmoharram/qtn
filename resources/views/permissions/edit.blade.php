@extends('layouts.base')

@section('title', 'Edit Permission')

@section('content')

    @include ('partials.errors.list')

    <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
    <br>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    {{ Form::submit('Update Permission', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
