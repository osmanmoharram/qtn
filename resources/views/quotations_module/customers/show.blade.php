@extends('layouts.base')

@section('title', $customer->name)

@section('content')

    <h1>{{ $customer->name }}</h1>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone: {{ $customer->phone }}</p>
    <p>Address: {{ $customer->address }}</p>

@endsection
