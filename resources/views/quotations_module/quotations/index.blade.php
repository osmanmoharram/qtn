@extends('layouts.base')

@section('title', 'Quotations')

@section('content')

    <h1 class="float-left"><i class="fas fa-file-invoice mr-3"></i>Quotations</h1>

    <a href="{{ route('quotations.create') }}" class="btn btn-primary float-right">New Quotation</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($quotations as $quotation)
            <tr>
                <td>{{ $quotation->customer->name }}</td>
                <td>{{ $quotation->request_date }}</td>
                <td>{{ $quotation->status }}</td>
                <td>{{ number_format($quotation->products->map(function ($product) {
            return $product->pivot->quantity * $product->pivot->unit_price;
        })->sum(), 2) }}</td>
                <td>
                    <a href="{{ route('quotations.show', $quotation->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">View</a>
                    <a href="{{ route('quotations.edit', $quotation->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['quotations.destroy', $quotation->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
