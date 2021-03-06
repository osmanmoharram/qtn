@extends('layouts.base')

@section('title', 'Edit Role')

@section('content')

    <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Role Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>
    @foreach ($permissions as $permission)

        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
    <br>
    {{ Form::submit('Update Role', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
