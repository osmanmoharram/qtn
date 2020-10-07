@extends('layouts.base')

@section('title', 'Employees')

@section('content')

    <h1 class="float-left"><i class="fas fa-user-tie mr-3"></i>Employees</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-primary float-right">New Employee</a>
    <a href="{{ route('employees.upload') }}" class="btn btn-outline-secondary float-right mr-3"><i class="fas fa-upload mr-2"></i>Upload Employees</a>

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
        @foreach ($employees as $employee)
            <tr>
                <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->user->name }}</a></td>

                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['employees.destroy', $employee->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
