@extends('layouts.base')

@section('title', 'Branches')

@section('content')

    <h1 class="float-left"><i class="fas fa-code-branch mr-3"></i>Branches</h1>

    <a href="{{ route('branches.create') }}" class="btn btn-primary float-right">New Branch</a>

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
        @foreach ($branches as $branch)
            <tr>
                <td><a href="{{ route('branches.show', $branch->id) }}">{{ $branch->name }}</a></td>

                <td>
                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['branches.destroy', $branch->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
