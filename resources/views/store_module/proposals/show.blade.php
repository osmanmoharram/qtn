@extends('layouts.base')

@section('title', 'Supplier Proposal No. #' . $proposal->id)

@section('content')

    <h1>Supplier Proposal No. #{{ $proposal->id }}</h1>
    <p>Supplier: {{ $proposal->supplier->name }}</p>
    <p>Department: {{ $proposal->department->name }}</p>
    <p>Employee: {{ $proposal->employee->user->name }}</p>
    <p>Date: {{ $proposal->quotation_date }}</p>
    <p>Status: {{ $proposal->status }}</p>
    <p>Rejection reason: {{ $proposal->rejection_reason }}</p>
    <p>Tax: {{ $proposal->tax }}</p>
    <p>Total: {{ $proposal->total }}</p>

@endsection
