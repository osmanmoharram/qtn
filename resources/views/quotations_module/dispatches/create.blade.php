@extends('layouts.base')

@section('title', 'Add New Dispatch Request')

@section('content')

    <h1>Add Dispatch Request</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'dispatches')) }}

    <div class="form-group">
        <label>
            Department&nbsp;
            <select name="department_id">
                <option></option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </label>

    </div>

    <div class="form-group">
        <label>
            Request Date&nbsp;
            <input type="date" name="request_date">
        </label>
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
