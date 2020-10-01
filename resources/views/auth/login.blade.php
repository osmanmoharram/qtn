<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!-- Place favicon.ico in the root directory -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <Style>
        html,
        body {
            height: 100%;
        }

        body {
            text-align: center;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f7fb;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-check label {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        #email {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        #password {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .error-msg {
            color: red;
            font-weight: 500;
            text-align: right !important;
            margin: 0 0 10px 0;
            padding: 0;
        }
    </Style>

</head>

<body>

<form class="form-signin" method="POST" action="{{ route('login') }}">

    <a class="back" href="{{ route('home') }}">
        <img style="margin-bottom: 10px;" src="{{ asset('img/logo.png') }}" alt="Logo" width="128" height="128">
    </a>

    <h1 style="font-size: 20px; font-weight: 500; margin: 0 0 10px 0; padding: 0;">Please login</h1>

    @if ($errors->has('email'))
        <p class="error-msg">
            {{ $errors->first('email') }}
        </p>
    @endif

    <label for="email" class="sr-only">E-mail</label>
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>

    @if ($errors->has('password'))
        <p class="error-msg">
            {{ $errors->first('password') }}
        </p>
    @endif

    <label for="password" class="sr-only">Password</label>
    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>

    <div class="form-check" style="margin-bottom: 10px;">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember" class="form-check-label">Remember me</label>
    </div>

    @csrf

    <button class="btn btn-primary btn-block" type="submit">Login</button>

    <a class="btn btn-link" href="{{ route('password.request') }}">
        Forgot password?
    </a>

    <p style="color: #627D98; margin-top: 3px; margin-bottom: 3px;">&copy; 2020 QTN. All rights reserved.</p>

</form>

</body>

</html>
