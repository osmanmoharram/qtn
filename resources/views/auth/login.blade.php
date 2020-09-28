@extends('layouts.app')

@section('content')

    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
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
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" @error('password')class="error"@enderror name="password" required autocomplete="current-password">

            @error('password')
            <span class="error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>

@endsection
