@extends('layouts.base')

@section('title', 'Order No. #' . $order->id)

@section('content')

    <h1>Order No. #{{ $order->id }}</h1>

    <p>Supplier {{ $order->supplier->name }}</p>
    <p>Employee {{ $order->employee->user->name }}</p>
    <p>Date {{ $order->issued_at }}</p>
    <p>Status {{ $order->status }}</p>
    <p>Tax {{ $order->tax }}</p>
    <p>Total {{ $order->total }}</p>

    <h3 class="mt-5">Products</h3>

    @if(count($order->products) > 0)

    <table class="table data-table">

        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->unit_price }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

    @else

    <p>No products.</p>

    @endif

    @if($order->payment_receipt)
    <h3>Receipt Copy</h3>
    <img src="{{ asset('storage/img/receipts') }}/{{ $order->payment_receipt }}" alt="Receipt Copy">
    @endif

@endsection
