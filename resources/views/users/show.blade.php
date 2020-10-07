@extends('layouts.base')

@section('title', $user->name)

@section('content')

    <h1>{{ $user->name }}</h1>

@endsection
