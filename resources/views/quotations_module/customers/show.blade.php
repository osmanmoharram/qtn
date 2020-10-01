@extends('layouts.base')

@section('title', $customer->name)

@section('content')

    <h1>{{ $customer->name }}</h1>

@endsection
