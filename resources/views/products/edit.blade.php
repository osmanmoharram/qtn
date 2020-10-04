@extends('layouts.base')

@section('title', 'Edit product: ' . $product->name)

@section('content')

    <h1>Edit {{$product->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categories, null, array('class' => 'form-control', 'placeholder' => 'Pick a category...')) }}
    </div>

    <div class="form-group">
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::number('quantity', null, ['class' => 'form-control', 'min' => 0]) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
