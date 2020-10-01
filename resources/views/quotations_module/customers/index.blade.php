@extends('layouts.base')

@section('title', 'Customers')

@section('content')

    <h1 class="float-left"><i class="fas fa-user-alt mr-3"></i>Customers</h1>

    <a href="{{ route('customers.create') }}" class="btn btn-primary float-right">New Customer</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->name }}</a></td>

                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['customers.destroy', $customer->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
