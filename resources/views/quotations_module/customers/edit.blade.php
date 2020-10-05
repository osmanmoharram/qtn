@extends('layouts.base')

@section('title', 'Edit customer: ' . $customer->name)

@section('content')

    <h1>Edit {{$customer->name}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::text('address', '', array('class' => 'form-control')) }}
        </div>
    

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection
