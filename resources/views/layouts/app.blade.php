<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <b-navbar toggleable="md" class="navbar-laravel">

            <!-- Collapsed Hamburger -->
            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

            <!-- Branding Image -->
            <b-navbar-brand href="{{ url('/') }}">
                <img src="{{ asset("img/ultrasecure-logo.png")}}" alt="{{ config('app.name', 'Laravel') }}" class="d-inline-block align-top">
            </b-navbar-brand>

            <b-collapse is-nav id="nav_collapse">
                <!-- Left Side Of Navbar -->
                <b-navbar-nav>
                    <b-nav-item :to="{ name: 'list-pronostics'}">Mes paris</b-nav-item>
                    <b-nav-item :to="{ name: 'list-matchs'}">Les matches</b-nav-item>
                    <b-nav-item :to="{ name: 'list-pronostics'}">Mon compte</b-nav-item>
                    <b-nav-item :to="{ name: 'leaderboard'}">Classement</b-nav-item>
                </b-navbar-nav>

                <!-- Right Side Of Navbar -->
                <b-navbar-nav class="ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <b-nav-item-dropdown text="{{ Auth::user()->name }}" right dusk="login-dropdown">
                            <b-dropdown-item href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" dusk="logout">
                                Logout
                            </b-dropdown-item>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </b-nav-item-dropdown>
                    @endguest
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
