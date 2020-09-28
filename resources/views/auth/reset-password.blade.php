@extends('layouts.app')

@section('content')

    <h1>Reset Password</h1>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" @error('email')class="error"@enderror name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="error">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" @error('password')class="error"@enderror name="password" required autocomplete="new-password">

            @error('password')
            <span class="error">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div>
            <button type="submit">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>

@endsection
