@extends('layouts.base')

@section('title', 'RFP No. #' . $request->id)

@section('content')

    <h1>Request for Proposal No. #{{ $request->id }}</h1>

    <p>Employee: {{ $request->employee->user->name }}</p>
    <p>Date: {{ $request->request_date }}</p>
    <p>Status: {{ $request->status }}</p>
    <p>Rejection reason: {{ $request->rejection_reason }}</p>

    <h3 class="mt-5">Products</h3>

    @if(count($request->products) > 0)

    <table class="table data-table">

        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($request->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

    @else

    <p>No products.</p>

    @endif

@endsection
