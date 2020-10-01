@extends('layouts.base')

@section('title', 'Suppliers')

@section('content')

    <h1 class="float-left"><i class="fas fa-store mr-3"></i>Suppliers</h1>

    <a href="{{ route('suppliers.create') }}" class="btn btn-primary float-right">New Supplier</a>

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
        @foreach ($suppliers as $supplier)
            <tr>
                <td><a href="{{ route('suppliers.show', $supplier->id) }}">{{ $supplier->name }}</a></td>

                <td>
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['suppliers.destroy', $supplier->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
