@extends('layouts.app')

@section('content')

    <h1>Forgot Password</h1>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" @error('email')class="error"@enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <button type="submit">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>

@endsection
