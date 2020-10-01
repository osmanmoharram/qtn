@extends('layouts.base')

@section('title', 'Edit Proposal No #' . $proposal->id)

@section('content')

    <h1>Edit Proposal No. #{{$proposal->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($proposal, array('route' => array('proposals.update', $proposal->id), 'method' => 'PUT')) }}

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
