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

    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categories, '', array('class' => 'form-control', 'placeholder' => 'Pick a category...')) }}
    </div>

    <div class="form-group">
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::number('quantity', 0, ['class' => 'form-control', 'min' => 0]) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save Product', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
