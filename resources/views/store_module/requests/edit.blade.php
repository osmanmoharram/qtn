@extends('layouts.base')

@section('title', 'Edit RFP No. #' . $request->id)

@section('content')

    <h1>Edit RFP No. #{{$request->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($request, array('route' => array('requests.update', $request->id), 'method' => 'PUT')) }}

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
