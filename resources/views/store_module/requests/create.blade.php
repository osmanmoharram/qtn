@extends('layouts.base')

@section('title', 'Create New RFP')

@section('content')

    <h1>New Request for Proposal</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'requests')) }}

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        {{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('request_date', 'Date') }}
        {{ Form::date('request_date', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['new' => 'New', 'approved' => 'Approved', 'rejected' => 'Rejected'], 'new', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rejection_reason', 'Rejection Reason') }}
        {{ Form::textarea('rejection_reason', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
