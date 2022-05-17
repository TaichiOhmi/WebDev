<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    {{-- search bar. show it when the user logs in --}}
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        {{-- Home --}}
                            <li class="nav-item" title='home'>
                                <a href="{{ route('index') }}" class="nav-link">
                                    <i class="fas fa-house-damage nav-icon"></i>
                                </a>
                            </li>
                        {{-- Create Post --}}
                            <li class="nav-item" title="Create Post">
                                <a href="{{ route('post.create') }}" class="nav-link">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                </a>
                            </li>
                        {{-- Account --}}
                            <li class="nav-item dropdown">
                                <button class="btn shadow-none nav-link" id="account-dropdown" data-bs-toggle="dropdown">
                                    @if (Auth::user()->avatar)
                                        <img src="{{ asset('/storage/images/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="user-avatar rounded-circle" style="width:2.1rem;height:2.1rem;">
                                    @else
                                        <i class="fas fa-user-circle nav-icon"></i>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    {{-- Admin Controls --}}

                                    {{-- Profile --}}
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">
                                        <i class="fas fa-user-circle"></i> Profile
                                    </a>
                                    {{-- Logout --}}
                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    {{-- For Admin Controls --}}
                        {{-- <div class="col-3"></div> --}}
                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
