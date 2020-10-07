@extends('layouts.base')

@section('title', 'Orders')

@section('content')

    <h1 class="float-left"><i class="fas fa-receipt mr-3"></i>Orders</h1>

    <a href="{{ route('orders.create') }}" class="btn btn-primary float-right">New Order</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Supplier</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->supplier->name }}</td>
                <td>{{ $order->issued_at }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ number_format($order->products->map(function ($product) {
            return $product->pivot->quantity * $product->pivot->unit_price;
        })->sum(), 2) }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">View</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['orders.destroy', $order->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
