<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MadMin Admin Laravel') }}</title>
    {{-- Icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon.png">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/materialize.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/materialize.min.js"></script>
    <script src="/assets/js/script.js"></script>
</head>
<body id="home" class="grey lighten-4">
    <div id="app">
        <nav class="blue darken-2">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.html" class="brand-logo">Madmin</a>
                    <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
                        <i class="fa fa-bars fa-2x"></i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                        @else
                            <li><a href="/home">Go Home {{ Auth::user()->name }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                    <!-- SideNav -->
                    <ul id="side-nav" class="side-nav">
                        @guest
                            <li>
                                <div class="user-view">
                                    <div class="background">
                                        <img src="/assets/img/ocean.jpg" alt="">
                                    </div>
                                    <a href="#">
                                        <span class="name white-text">MadMin Admin</span>
                                    </a>
                                </div>
                            </li>
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                        @else
                            <li>
                                <div class="user-view">
                                    <div class="background">
                                        <img src="/assets/img/ocean.jpg" alt="">
                                    </div>
                                    <a href="/home">
                                        <span class="name white-text">{{ Auth::user()->name }}</span>
                                    </a>
                                    <a href="/home">
                                        <span class="email white-text">{{ Auth::user()->email }}</span>
                                    </a>
                                </div>
                            </li>
                            <li><a href="#" class="subheader">Account Controls</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
{{-- Flash Messages --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            Materialize.toast('{{ $error }}', 4000);
        </script>
    @endforeach
@endif
@if ( @session > 0)
    <script>
        Materialize.toast('{{ @session }}', 4000);
    </script>
@endif
</body>
</html>
