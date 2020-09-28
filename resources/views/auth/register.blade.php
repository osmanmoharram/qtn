@extends('layouts.app')

@section('content')

    <h1>Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">{{ __('Name') }}</label>

            <input id="name" type="text" @error('name')class="error"@enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" @error('email')class="error"@enderror name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" @error('password')class="error"@enderror name="password" required autocomplete="new-password">

            @error('password')
            <span class="error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div>
            <label for="phone">Phone</label>

            <input id="phone" type="text" @error('phone')class="error"@enderror name="phone" value="{{ old('phone') }}">

            @error('phone')
            <span class="error">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="branch_id">Branch</label>

            <select id="branch_id" name="branch_id" @error('phone')class="error"@enderror>
{{--                <option value="">select branch ...</option>--}}
            </select>

            @error('branch_id')
            <span class="error">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <button type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </form>

@endsection
