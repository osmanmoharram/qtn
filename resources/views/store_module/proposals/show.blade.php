@extends('layouts.base')

@section('title', 'Supplier Proposal No. #' . $proposal->id)

@section('content')

    <h1>Supplier Proposal No. #{{ $proposal->id }}</h1>

@endsection
