@extends('layouts.base')

@section('title', $user->name)

@section('content')

    <h1>{{ $user->name }}</h1>

    <div class="form-group">
        <label>
            Email: &nbsp;
            <span class="">{{ $user->email }}</span>
        </label>
    </div>

    <div class='form-group'>
        <ul>
            @foreach ($user->roles() as $role)
                <li>{{ $role }}</li>
            @endforeach
        </ul>
    </div>
@endsection
