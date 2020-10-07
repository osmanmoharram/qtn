@extends('layouts.base')

@section('title', 'Add New Customer')

@section('content')

    <h1>New Customer</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'customers')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save Customer', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection
