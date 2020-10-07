@extends('layouts.base')

@section('title', 'Edit category: ' . $category->name)

@section('content')

    <h1>Edit {{$category->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Update Category', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
