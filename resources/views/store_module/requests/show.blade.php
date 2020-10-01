@extends('layouts.base')

@section('title', 'RFP No. #' . $request->id)

@section('content')

    <h1>Request for Proposal No. #{{ $request->id }}</h1>

@endsection
