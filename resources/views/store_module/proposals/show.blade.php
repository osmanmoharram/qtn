@extends('layouts.base')

@section('title', 'Supplier Proposal No. #' . $proposal->id)

@section('content')

    <h1>Supplier Proposal No. #{{ $proposal->id }}</h1>
    <p>Supplier: {{ $proposal->supplier->name }}</p>
    <p>Department: {{ $proposal->department->name }}</p>
    <p>Employee: {{ $proposal->employee->user->name }}</p>
    <p>Date: {{ $proposal->quotation_date }}</p>
    <p>Status: {{ $proposal->status }}</p>
    <p>Rejection reason: {{ $proposal->rejection_reason }}</p>
    <p>Tax: {{ $proposal->tax }}</p>
    <p>Total: {{ number_format($proposal->products->map(function ($product) {
            return $product->pivot->quantity * $product->pivot->unit_price;
        })->sum(), 2) }}</p>

    <h3 class="mt-5">Products</h3>

    @if(count($proposal->products) > 0)

    <table class="table data-table">

        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($proposal->products as $product)
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

@endsection
