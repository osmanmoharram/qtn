@extends('layouts.base')

@section('title', 'Edit employee: ' . $employee->name)

@section('content')

    <h1>Edit {{$employee->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $employee->user->name, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $employee->user->email, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', $employee->user->phone, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('branch_id', 'Branch') }}
        {{ Form::select('branch_id', $branches, null, ['placeholder' => 'Pick a branch...', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_branch_manager', 'Branch Manager ?', ['class' => 'mr-4']) }}
        {{ Form::label('is_branch_manager', 'Yes', ['class' => 'mr-2']) }}
        {{ Form::radio('is_branch_manager', 1, null) }}
        {{ Form::label('is_branch_manager', 'No', ['class' => 'ml-4 mr-2']) }}
        {{ Form::radio('is_branch_manager', 0, null) }}
    </div>

    <div class="form-group">
        {{ Form::label('department_id', 'Department') }}
        {{ Form::select('department_id', $departments, null, ['placeholder' => 'Pick a department...', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_department_manager', 'Department Manager ?', ['class' => 'mr-4']) }}
        {{ Form::label('is_department_manager', 'Yes', ['class' => 'mr-2']) }}
        {{ Form::radio('is_department_manager', 1, null) }}
        {{ Form::label('is_department_manager', 'No', ['class' => 'ml-4 mr-2']) }}
        {{ Form::radio('is_department_manager', 0, null) }}
    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
