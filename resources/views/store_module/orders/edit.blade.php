@extends('layouts.base')

@section('title', 'Edit Order No. #' . $order->id)

@section('content')

    <h1>Edit Order No. #{{$order->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($order, array('route' => array('orders.update', $order->id), 'method' => 'PUT', 'files' => true)) }}

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
        {{ Form::date('issued_at', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['awaiting' => 'Awaiting Supplier Delivery', 'online' => 'Processing Online', 'received' => 'Received at department store', 'stored' => 'Sent to main store'], null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('payment_receipt', 'Payment Receipt') }}
        {{ Form::file('payment_receipt', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tax', 'Tax') }}
        {{ Form::text('tax', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
