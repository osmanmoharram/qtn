@extends('layouts.base')

@section('title', $customer->name)

@section('content')

    <h1>{{ $customer->name }}</h1>

    <table class="table">
        <tr>
            <th>Email</th>
            <td>{{ $customer->email }}</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>{{ $customer->email }}</td>
        </tr>

        <tr>
            <th>Address</th>
            <td>{{ $customer->address }}</td>
        </tr>
    </table>

@endsection
