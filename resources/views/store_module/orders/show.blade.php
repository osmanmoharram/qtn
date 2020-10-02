@extends('layouts.base')

@section('title', 'Order No. #' . $order->id)

@section('content')

    <h1>Order No. #{{ $order->id }}</h1>

    <p>Supplier {{ $order->supplier->name }}</p>
    <p>Employee {{ $order->employee->user->name }}</p>
    <p>Date {{ $order->issued_at }}</p>
    <p>Status {{ $order->status }}</p>
    <p>Receipt {{ $order->payment_receipt }}</p>
    <p>Tax {{ $order->tax }}</p>
    <p>Total {{ $order->total }}</p>

    <h3>Receipt Copy</h3>
    <img src="{{ asset('storage/img/receipts') }}/{{ $order->payment_receipt }}" alt="Receipt Copy">

@endsection
