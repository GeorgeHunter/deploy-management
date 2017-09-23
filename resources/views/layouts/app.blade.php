<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container">


    <nav class="navbar" role="navigation" aria-label="main navigation" style="margin-bottom: 24px;">
        {{--<div class="navbar-brand">--}}
        <a class="navbar-item" style="font-size: 1.4em;" href="/">
            {{ config('app.name') }}
        </a>

        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>
            </div>

            <div class="navbar-end">
                @guest
                <a class="navbar-item" href="{{ route('login') }}">Login</a>
                <a class="navbar-item" href="{{ route('register') }}">Register</a>
                @else
                <div class="navbar-item has-dropdown is-hoverable">

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="navbar-dropdown">
                            <a href="" class="navbar-item">Hello</a>
                            <a href="" class="navbar-item">Hello</a>
                            <a href="" class="navbar-item">Hello</a>
                            <hr class="navbar-divider">

                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>

                </div>

                @endguest



                {{--<hr class="navbar-divider">--}}
                {{--<div class="navbar-item">--}}
                {{--<div>--}}
                {{--<p class="is-size-6-desktop">--}}
                {{--<strong class="has-text-info">0.5.3</strong>--}}
                {{--</p>--}}

                {{--<small>--}}
                {{--<a class="bd-view-all-versions" href="/versions">View all versions</a>--}}
                {{--</small>--}}

                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>

        <button class="button navbar-burger">
            <span></span>
            <span></span>
            <span></span>
        </button>
        {{--</div>--}}
    </nav>
</div>







@yield('content')

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
