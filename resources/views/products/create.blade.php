@extends('layouts.base')

@section('title', 'Add New Product')

@section('content')

    <h1>Add Product</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'products')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
