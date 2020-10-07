@extends('layouts.base')

@section('title', 'Add New Employee')

@section('content')

    <h1>Add Employee</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'employees')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('branch_id', 'Branch') }}
        {{ Form::select('branch_id', $branches, null, ['placeholder' => 'Pick a branch...', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_branch_manager', 'Branch Manager?', ['class' => 'mr-4']) }}
        {{ Form::label('is_branch_manager_yes', 'Yes', ['class' => 'mr-2']) }}
        {{ Form::radio('is_branch_manager', 1, null, ['id' => 'is_branch_manager_yes']) }}
        {{ Form::label('is_branch_manager_no', 'No', ['class' => 'ml-4 mr-2']) }}
        {{ Form::radio('is_branch_manager', 0, null, ['id' => 'is_branch_manager_no']) }}
    </div>

    <div class="form-group">
        {{ Form::label('department_id', 'Department') }}
        {{ Form::select('department_id', $departments, null, ['placeholder' => 'Pick a department...', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_department_manager', 'Department Manager?', ['class' => 'mr-4']) }}
        {{ Form::label('is_department_manager_yes', 'Yes', ['class' => 'mr-2']) }}
        {{ Form::radio('is_department_manager', 1, null, ['id' => 'is_department_manager_yes']) }}
        {{ Form::label('is_department_manager_no', 'No', ['class' => 'ml-4 mr-2']) }}
        {{ Form::radio('is_department_manager', 0, null, ['id' => 'is_department_manager_no']) }}
    </div>

    {{ Form::submit('Save Employee', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
