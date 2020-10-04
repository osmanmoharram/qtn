@extends('layouts.base')

@section('title', 'Users')

@section('content')

    <h1 class="float-left"><i class="far fa-building mr-3"></i>Departments</h1>

    <a href="{{ route('departments.create') }}" class="btn btn-primary float-right">New Department</a>

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
        @foreach ($departments as $department)
            <tr>
                <td><a href="{{ route('departments.show', $department->id) }}">{{ $department->name }}</a></td>

                <td>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['departments.destroy', $department->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
