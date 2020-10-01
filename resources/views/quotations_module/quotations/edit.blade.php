@extends('layouts.base')

@section('title', 'Edit quotation No. #' . $quotation->id)

@section('content')

    <h1>Edit Quotation No. #{{$quotation->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($quotation, array('route' => array('quotations.update', $quotation->id), 'method' => 'PUT')) }}

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
