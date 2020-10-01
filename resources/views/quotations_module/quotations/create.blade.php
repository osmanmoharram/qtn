@extends('layouts.base')

@section('title', 'Add New Quotation')

@section('content')

    <h1>Create Quotation</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'quotations')) }}

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
