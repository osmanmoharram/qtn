@extends('layouts.base')

@section('title', 'Edit Proposal No #' . $proposal->id)

@section('content')

    <h1>Edit Proposal No. #{{$proposal->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($proposal, array('route' => array('proposals.update', $proposal->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('supplier_id', 'Supplier') }}
        {{ Form::select('supplier_id', $suppliers, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('department_id', 'Department') }}
        {{ Form::select('department_id', $departments, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        {{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('quotation_date', 'Date') }}
        {{ Form::date('quotation_date', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['pending_approval' => 'Pending Approval', 'approved' => 'Approved', 'rejected' => 'Rejected'], null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rejection_reason', 'Rejection Reason') }}
        {{ Form::textarea('rejection_reason', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tax', 'Tax') }}
        {{ Form::text('tax', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
