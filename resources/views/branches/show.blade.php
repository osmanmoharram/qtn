@extends('layouts.base')

@section('title', $branch->name)

@section('content')

    <h1>{{ $branch->name }}</h1>
    <h3>{{ $branch->location }}</h3>

@endsection
