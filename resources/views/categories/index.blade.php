@extends('layouts.base')

@section('title', 'Users')

@section('content')

    <h1 class="float-left"><i class="fas fa-layer-group mr-3"></i>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">New Category</a>

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
        @foreach ($categories as $category)
            <tr>
                <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>

                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
