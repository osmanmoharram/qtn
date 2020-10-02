@extends('layouts.base')

@section('title', 'Supplier Proposals')

@section('content')

    <h1 class="float-left"><i class="fas fa-file-invoice-dollar mr-3"></i>Supplier Proposals</h1>

    <a href="{{ route('proposals.create') }}" class="btn btn-primary float-right">New Proposal</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Supplier</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($proposals as $proposal)
            <tr>
                <td>{{ $proposal->supplier->name }}</td>
                <td>{{ $proposal->quotation_date }}</td>
                <td>{{ $proposal->total }}</td>
                <td>{{ $proposal->status }}</td>
                <td>
                    <a href="{{ route('proposals.show', $proposal->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">View</a>
                    <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['proposals.destroy', $proposal->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
