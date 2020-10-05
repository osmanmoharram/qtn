@extends('layouts.base')

@section('title', $dispatch->id)

@section('content')

    <h1>Dispatch Request No. #{{ $dispatch->id }}</h1>

    <table class="table">
        <tr>
            <th>Department</th>
            <td>{{ $dispatch->department->name }}</td>
        </tr>

        <tr>
            <th>Employee</th>
            <td>{{ $dispatch->employee->name }}</td>
        </tr>

        <tr>
            <th>Request Date</th>
            <td>{{ $dispatch->request_date }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $dispatch->status }}</td>
        </tr>

        @if ($dispatch->rejection_reason)
            <tr>
                <th>Rejection Reason</th>
                <td>{{ $dispatch->rejection_reason }}</td>
            </tr>
        @endif
    </table>
@endsection
