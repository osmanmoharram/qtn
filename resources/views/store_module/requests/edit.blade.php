@extends('layouts.base')

@section('title', 'Edit RFP No. #' . $request->id)

@section('content')

    <h1>Edit RFP No. #{{$request->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($request, array('route' => array('requests.update', $request->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        {{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('request_date', 'Date') }}
        {{ Form::date('request_date', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['new' => 'New', 'approved' => 'Approved', 'rejected' => 'Rejected'], null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rejection_reason', 'Rejection Reason') }}
        {{ Form::textarea('rejection_reason', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
