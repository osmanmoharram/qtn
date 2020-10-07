@extends('layouts.base')

@section('title', 'Roles')

@section('content')

    <h1 class="float-left"><i class="fas fa-theater-masks fa-fw mr-3"></i>Roles</h1>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-primary float-right">Add Role</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Permissions</th>
            <th>Operation</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($roles as $role)
            <tr>

                <td>{{ $role->name }}</td>

                <td>{{  $role->permissions()->pluck('name')->implode(', ') }}</td>
                <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
