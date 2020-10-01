@extends('layouts.base')

@section('title', $employee->name)

@section('content')

    <h1>{{ $employee->user->name }}</h1>

@endsection
