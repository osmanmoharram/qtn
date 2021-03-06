@extends('layouts.base')

@section('title', 'Add New Role')

@section('content')

    <h1><i class='fa fa-key'></i> Add Role</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'roles')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
    </div>

    {{ Form::submit('Save Role', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
