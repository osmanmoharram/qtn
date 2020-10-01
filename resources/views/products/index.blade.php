@extends('layouts.base')

@section('title', 'Products')

@section('content')

    <h1 class="float-left"><i class="fas fa-cubes mr-3"></i>Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary float-right">New Product</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                <td>{{ $product->category->name }}</td>

                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
