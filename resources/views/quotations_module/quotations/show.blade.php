@extends('layouts.base')

@section('title', 'Quotation No. #' . $quotation->id)

@section('content')

    <h1>Quotation No. #{{ $quotation->id }}</h1>
    <p>Customer: {{ $quotation->customer->name }}</p>
    <p>Department: {{ $quotation->department->name }}</p>
    <p>Date: {{ $quotation->request_date }}</p>
    <p>Status: {{ $quotation->status }}</p>
    <p>Rejection reason: {{ $quotation->rejection_reason }}</p>
    <p>Tax: {{ $quotation->tax }}</p>
    <p>Total: {{ number_format($quotation->products->map(function ($product) {
            return $product->pivot->quantity * $product->pivot->unit_price;
        })->sum(), 2) }}</p>
    <p>Validity: {{ $quotation->validity }}</p>

    <h3 class="mt-5">Products</h3>

    @if(count($quotation->products) > 0)

        <table class="table data-table">

            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($quotation->products as $product)
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
