@extends('layouts.base')

@section('title', 'New Supplier')

@section('content')

    <h1>New Supplier</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'suppliers')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
