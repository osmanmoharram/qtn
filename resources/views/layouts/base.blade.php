<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="generator" content="PHPStorm 2018.2.5">
    <meta name="author" content="Mohammed A. Moharram">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!-- Place favicon.ico in the root directory -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
    @livewireStyles
</head>

<body>
    <div id="app">

        <div class="wrapper">

            <div class="sidebar">

                <div class="sidebar-header">
                    <h3><a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" class="mr-3" style="width: 28px;">QTN</a></h3>
                </div><!-- .sidebar-header -->

                <div class="sidebar-nav">

                    <div class="nav-section">
                        <h5 class="nav-section-title mb-2">Main</h5>
                        <ul>
                            <li class="{{ (Route::is('home')) ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt fa-fw"></i>Dashboard</a></li>
{{--                            <li class="{{ (Route::is('users.index')) ? 'active' : '' }}">--}}
{{--                                <a href="#alumniSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-graduation-cap fa-fw"></i>Users</a>--}}
{{--                                <ul class="collapse" id="alumniSubmenu">--}}
{{--                                    <li><a href="#">All Users</a></li>--}}
{{--                                    <li><a href="#">Add User</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li class="{{ (Route::is('users.*')) ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fas fa-users fa-fw"></i>Users</a></li>
                            <li class="{{ (Route::is('roles.*')) ? 'active' : '' }}"><a href="{{ route('roles.index') }}"><i class="fas fa-theater-masks fa-fw"></i>Roles</a></li>
                            <li class="{{ (Route::is('permissions.*')) ? 'active' : '' }}"><a href="{{ route('permissions.index') }}"><i class="fas fa-key fa-fw"></i>Permissions</a></li>
                            <li class="{{ (Route::is('branches.*')) ? 'active' : '' }}"><a href="{{ route('branches.index') }}"><i class="fas fa-code-branch fa-fw"></i>Branches</a></li>
                            <li class="{{ (Route::is('departments.*')) ? 'active' : '' }}"><a href="{{ route('departments.index') }}"><i class="far fa-building fa-fw"></i>Departments</a></li>
                            <li class="{{ (Route::is('employees.*')) ? 'active' : '' }}"><a href="{{ route('employees.index') }}"><i class="fas fa-user-tie fa-fw"></i>Employees</a></li>
                            <li class="{{ (Route::is('categories.*')) ? 'active' : '' }}"><a href="{{ route('categories.index') }}"><i class="fas fa-layer-group fa-fw"></i>Categories</a></li>
                            <li class="{{ (Route::is('products.*')) ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="fas fa-cubes fa-fw"></i>Products</a></li>
                        </ul>
                    </div><!-- .nav-section -->

                    <div class="nav-section">
                        <h5 class="nav-section-title mb-2">Quotations Module</h5>
                        <ul>
                            <li class="{{ (Route::is('customers.*')) ? 'active' : '' }}"><a href="{{ route('customers.index') }}"><i class="fas fa-user-alt fa-fw"></i>Customers</a></li>
                            <li class="{{ (Route::is('quotations.*')) ? 'active' : '' }}"><a href="{{ route('quotations.index') }}"><i class="fas fa-file-invoice fa-fw"></i>Quotations</a></li>
                            <li class="{{ (Route::is('dispatches.*')) ? 'active' : '' }}"><a href="{{ route('dispatches.index') }}"><i class="fas fa-truck-loading fa-fw"></i>Dispatches</a></li>
                        </ul>
                    </div><!-- .nav-section -->

                    <div class="nav-section">
                        <h5 class="nav-section-title mb-2">Store Module</h5>
                        <ul>
                            <li class="{{ (Route::is('suppliers.*')) ? 'active' : '' }}"><a href="{{ route('suppliers.index') }}"><i class="fas fa-store fa-fw"></i>Suppliers</a></li>
                            <li class="{{ (Route::is('requests.*')) ? 'active' : '' }}"><a href="{{ route('requests.index') }}"><i class="fas fa-file-alt fa-fw"></i>Requests</a></li>
                            <li class="{{ (Route::is('proposals.*')) ? 'active' : '' }}"><a href="{{ route('proposals.index') }}"><i class="fas fa-file-invoice-dollar fa-fw"></i>Proposals</a></li>
                            <li class="{{ (Route::is('orders.*')) ? 'active' : '' }}"><a href="{{ route('orders.index') }}"><i class="fas fa-receipt fa-fw"></i>Orders</a></li>
                        </ul>
                    </div><!-- .nav-section -->

                </div><!-- .sidebar-nav -->

            </div><!-- .sidebar -->

            <div class="contents">

                <nav class="navbar navbar-expand-lg navbar-light main-nav">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">Home</a>--}}
{{--                            </li>--}}
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (config('auth.allow_registrations'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @if(auth()->user()->profile_picture)
                                            <img class="profile-pic" src="{{ asset('storage/img/profiles') }}/{{ Auth::user()->profile_picture }}" alt="Profile Picture">
                                        @else
                                            <img class="profile-pic" src="{{ asset('storage/img/profiles/default.jpg') }}" alt="Profile Picture">
                                        @endif
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            Dashboard
                                        </a>

                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            Users
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div><!-- .navbar-collapse -->

                </nav>

                <div class="content-wrapper">

                    @if(session()->has('flash_message'))
                    <!-- session alerts -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="alert-heading">Success!</h4>
                        <p>{{ session()->get('flash_message') }}</p>
                    </div>
                    @endif

                    @yield('content')
                </div><!-- .content-wrapper -->

            </div><!-- .contents -->

        </div><!-- .wrapper -->

        <div class="admin-footer">
            <p class="text-center">&copy;2020 QTN Application. All rights reserved.</p>
        </div><!-- .footer -->

    </div><!-- #app -->

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('div.sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

    @yield('scripts')
    @livewireScripts
</body>
</html>
