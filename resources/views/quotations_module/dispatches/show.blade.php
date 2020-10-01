@extends('layouts.base')

@section('title', $dispatch->name)

@section('content')

    <h1>Dispatch Request No. #{{ $dispatch->name }}</h1>

@endsection
