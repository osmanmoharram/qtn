@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')

    <h1><i class="fas fa-tachometer-alt fa-fw mr-3"></i>Test</h1>

    <hr class="mb-5">

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'test', 'class' => 'form-inline')) }}

    <div class="form-group mb-3">
        {{ Form::label('product[0][product_id]', 'Product 1', ['class' => 'mr-2']) }}
        {{ Form::text('product[0][product_id]', null, array('class' => 'form-control mr-3', 'id' => 'product[0][product_id]')) }}

        {{ Form::label('quantity', 'Quantity', ['class' => 'mr-2']) }}
        {{ Form::text('product[0][quantity]', null, array('class' => 'form-control mr-3')) }}

        {{ Form::label('unit_price', 'Unit Price', ['class' => 'mr-2']) }}
        {{ Form::text('product[0][unit_price]', null, array('class' => 'form-control mr-3')) }}
    </div>

    <div class="form-group mb-3">
        {{ Form::label('product[1][product_id]', 'Product 2', ['class' => 'mr-2']) }}
        {{ Form::text('product[1][product_id]', null, array('class' => 'form-control mr-3', 'id' => 'product[1][product_id]')) }}

        {{ Form::label('quantity', 'Quantity', ['class' => 'mr-2']) }}
        {{ Form::text('product[1][quantity]', null, array('class' => 'form-control mr-3')) }}

        {{ Form::label('unit_price', 'Unit Price', ['class' => 'mr-2']) }}
        {{ Form::text('product[1][unit_price]', null, array('class' => 'form-control mr-3')) }}
    </div>

    <div class="form-group mb-3">
        {{ Form::label('product_id', 'Product 3', ['class' => 'mr-2']) }}
        {{ Form::text('product[2][product_id]', null, array('class' => 'form-control mr-3')) }}

        {{ Form::label('quantity', 'Quantity', ['class' => 'mr-2']) }}
        {{ Form::text('product[2][quantity]', null, array('class' => 'form-control mr-3')) }}

        {{ Form::label('unit_price', 'Unit Price', ['class' => 'mr-2']) }}
        {{ Form::text('product[2][unit_price]', null, array('class' => 'form-control mr-3')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary btn-block mt-4')) }}

    {{ Form::close() }}

@endsection
