@extends('layouts.base')

@section('title', 'Order No. #' . $user->id)

@section('content')

    <h1>Order No. #{{ $user->id }}</h1>

@endsection
