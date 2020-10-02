@extends('layouts.base')

@section('title', $supplier->name)

@section('content')

    <h1>{{ $supplier->name }}</h1>
    <p>Email: {{ $supplier->email }}</p>
    <p>Phone: {{ $supplier->phone }}</p>
    <p>Address: {{ $supplier->address }}</p>

@endsection
