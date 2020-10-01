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
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>
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
