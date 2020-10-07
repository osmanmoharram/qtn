@extends('layouts.base')

@section('title', $dispatch->name)

@section('content')

    <h1>Dispatch Request No. #{{ $dispatch->name }}</h1>

    <p>Employee: {{ $dispatch->employee->user->name }}</p>
    <p>Department: {{ $dispatch->department->name }}</p>
    <p>Date: {{ $dispatch->request_date }}</p>
    <p>Status: {{ $dispatch->status }}</p>
    <p>Rejection reason: {{ $dispatch->rejection_reason }}</p>

    <h3 class="mt-5">Products</h3>

    @if(count($dispatch->products) > 0)

        <table class="table data-table">

            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($dispatch->products as $product)
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
