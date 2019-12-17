<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-info">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="navbar-item">TOKO ONLINE</a>

                <a class="navbar-burger" role="button" aria-label="menu" aria-expanded="false" data-target="navMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navMenu">
                <div class="navbar-end">
                    @guest
                        <div class="navbar-item">
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('login') }}" class="button is-light">Login</a>
                                    <a href="{{ route('register') }}" class="button is-light">Register</a>
                                </p>
                            </div>
                        </div>
                    @endguest

                    @auth
                    <div class="navbar-item">
                        @php
                            $cartTotal = 0;
                            if (session()->has('cart')) {
                                $cartTotal = count(session('cart'));
                            }
                        @endphp
                        <a href="{{ route('cart.index') }}" class="has-text-danger">Cart ( {{ $cartTotal }} )</a>
                    </div>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <div class="navbar-link">
                                <span>{{ auth()->user()->name }}</span>
                            </div>

                            <div class="navbar-dropdown">
                                <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                                </a>

                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                                @csrf
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <section class="section">
            @yield('content')
        </section>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

        });
    });
    }

    });
    </script>
</body>
</html>
