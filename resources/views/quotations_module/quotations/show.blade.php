@extends('layouts.base')

@section('title', 'Quotation No. #' . $quotation->id)

@section('content')

    <h1>Quotation No. #{{ $quotation->id }}</h1>

@endsection
