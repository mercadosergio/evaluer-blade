<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->
    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="Header bg-primary">
            <nav class="Header-nav">
                <!-- Mobile design -->
                <div class="Header-hamburger mobile-display">
                    <i class="hamburger bi bi-list toggle-sidebar-btn"></i>

                </div>

                <!-- Escritorio design -->
                <ul class="Header-ul desktop-display">
                    <li class="Header-li"><a class="Header-a" href="">Inicio</a></li>
                    <li class="Header-li"><a class="Header-a" href="">Consulta</a></li>
                    <li class="Header-li"><a class="Header-a" href="">Estudiante</a></li>
                    <li class="Header-li"><a class="Header-a" href="">Asesor</a></li>
                </ul>
            </nav>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/header.js') }}"></script>
</body>

</html>