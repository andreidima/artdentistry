<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/app.js?v='.filemtime(public_path('js/app.js'))) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/andrei.css') }}" rel="stylesheet">

    <!-- Font Awesome links -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
</head>
<body>
    @auth
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: darkcyan">
            <div class="container">
                <a class="navbar-brand me-5" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('pacienti.index') }}">
                                <i class="fas fa-users me-1"></i>Pacienți
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('programari.afisareSaptamanal') }}">
                                <i class="fas fa-calendar-check me-1"></i>Programări
                            </a>
                        </li> --}}
                        <li class="nav-item me-3 dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-calendar-check me-1"></i>Programări
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('programari.afisareSaptamanal') }}">Vizualizare săptămânal</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('programari.afisareLunar') }}">Vizualizare lunar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('programari.index') }}">Administrare</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('fise-de-tratament.index') }}">
                                <i class="fas fa-file-alt me-1"></i>Fișe de tratament
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('etichete.index') }}">
                                <i class="fa fa-tags me-1"></i>Etichete
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('retete.index') }}">
                                <i class="fas fa-receipt me-1"></i>Rețete
                            </a>
                        </li>
                        <li class="nav-item me-3 dropdown">
                            <a class="nav-link active dropdown-toggle rounded-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #00b7ff">
                                <i class="fas fa-calendar-check me-1"></i>Programări Cardiologie
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('cardiologie.programari.afisareSaptamanal') }}">Vizualizare săptămânal</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('cardiologie.programari.afisareLunar') }}">Vizualizare lunar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('cardiologie.programari.index') }}">Administrare</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('servicii.index') }}">
                                <i class="fas fa-tooth me-1"></i>Servicii
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('servicii-categorii.index') }}">
                                <i class="fas fa-tooth me-1"></i>Categorii de servicii
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item me-3 dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tooth me-1"></i>Servicii
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('servicii-categorii.index') }}">Categorii de servicii</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('servicii.index') }}">Servicii</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('vizualizare-ramificatii-servicii') }}">Vizualizarea ramificațiilor</a></li>
                            </ul>
                        </li> --}}
                        <li class="nav-item me-3 dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars me-1"></i>
                                Utile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('mesaje-trimise-sms.index') }}">
                                        SMS trimise
                                    </a>
                                </li>
                            </div>
                        </li>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" id="navbarAuthentication" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarAuthentication">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
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
    @else
        @yield('content')
    @endauth
</body>
</html>
