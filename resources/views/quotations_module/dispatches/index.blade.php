@extends('layouts.base')

@section('title', 'Dispatches')

@section('content')

    <h1 class="float-left"><i class="fas fa-truck-loading mr-3"></i>Dispatch Requests</h1>

    <a href="{{ route('dispatches.create') }}" class="btn btn-primary float-right">New Dispatch Request</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($dispatches as $dispatch)
            <tr>
                <td>{{ $dispatch->employee->user->name }}</td>
                <td>{{ $dispatch->request_date }}</td>
                <td>{{ $dispatch->status }}</td>
                <td>
                    <a href="{{ route('dispatches.show', $dispatch->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">View</a>
                    <a href="{{ route('dispatches.edit', $dispatch->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['dispatches.destroy', $dispatch->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
