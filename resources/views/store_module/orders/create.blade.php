@extends('layouts.base')

@section('title', 'Create New Order')

@section('content')

    <h1>Create New Order</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'orders', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('supplier_id', 'Supplier') }}
        {{ Form::select('supplier_id', $suppliers, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        {{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('issued_at', 'Date') }}
        {{ Form::date('issued_at', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['awaiting' => 'Awaiting Supplier Delivery', 'online' => 'Processing Online', 'received' => 'Received at department store', 'stored' => 'Sent to main store'], 'awaiting', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('payment_receipt', 'Payment Receipt') }}
        {{ Form::file('payment_receipt', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tax', 'Tax') }}
        {{ Form::text('tax', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
