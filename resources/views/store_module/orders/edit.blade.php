@extends('layouts.base')

@section('title', 'Edit Order No. #' . $order->id)

@section('content')

    <h1>Edit Order No. #{{$order->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($order, array('route' => array('orders.update', $order->id), 'method' => 'PUT')) }}

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
