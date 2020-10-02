@extends('layouts.base')

@section('title', 'RFP No. #' . $request->id)

@section('content')

    <h1>Request for Proposal No. #{{ $request->id }}</h1>

    <p>Employee: {{ $request->employee->user->name }}</p>
    <p>Date: {{ $request->request_date }}</p>
    <p>Status: {{ $request->status }}</p>
    <p>Rejection reason: {{ $request->rejection_reason }}</p>

@endsection
