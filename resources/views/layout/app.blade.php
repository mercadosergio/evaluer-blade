<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Evaluer</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/css/layout.css', 'resources/js/header.js'])
    @stack('styles')

</head>

<body>
    <header class="Header back-primary">
        <nav class="Header-nav">
            <!-- Mobile design -->
            <div class="Header-hamburger mobile-display">
                <i class="hamburger bi bi-list toggle-sidebar-btn"></i>
                <a class="Isotipo-a" href="">
                    <img class="Isotipo" src="{{ asset('img/iso.png') }}" alt="">
                </a>
            </div>
            <!-- Escritorio design -->
            <div class="Header-container_logo desktop-display">
                <img src="{{ asset('img/aunar-logo-1.png') }}" class="logo-aunar">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{ asset('img/evaluer-logo-2.png') }}" class="logo-evaluer">
                </a>
            </div>
            <!-- Escritorio design -->
            <ul class="Header-ul desktop-display">
                <li class="Header-li"><a class="Header-a" href="">Inicio</a></li>
            </ul>

            @auth
                <div class="Dropdown">
                    <input class="dropdown-checkbox" type="checkbox" id="dropdown" name="dropdown" />
                    <label class="for-dropdown" for="dropdown"> <a class="Avatar" data-dropdown-button>
                            <img class="Avatar-img" src="{{ asset('avatar/' . auth()->user()->avatar) }}" alt="">
                            <span class="Avatar-span">{{ auth()->user()->name }}</span>
                        </a></label>
                    <ul class="Dropdown-ul">
                        <li class="Dropdown-li"><a class="Dropdown-a dropdown-item" href="/configuracion"><i
                                    class="Dropdown-i bi bi-gear"></i>Configuración</a></li>
                        <li class="Dropdown-li"><a class="Dropdown-a dropdown-item text-danger"
                                href="{{ route('logout') }}"><i class="Dropdown-i bi bi-box-arrow-left"></i>Cerrar
                                sesión</a></li>
                    </ul>
                </div>
            @endauth

        </nav>
    </header>
    <main class="Main">
        @yield('content')
    </main>

    <footer class="Footer back-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="Footer-info">
                        <section class="Footer-about">
                            <h3 class="Footer-h3" for="">Sobre nosotros</h3>
                            <p class="Footer-p">Evaluer es una plataforma que permite establecer los pasos
                                específicos para el buen manejo y administración de los recursos digitales que se hacen
                                con la entrega de estos, para la Gestión de Proyectos de Grado en la Corporacion
                                Universitaria Autonoma de Nariño, esto con el fin de promover una interacción entre el
                                estudiante y el docente.</p>
                        </section>

                        <section class="Footer-team">
                            <h3 class="Footer-h3 team-title">Equipo de desarrollo</h3>
                            <div class="Footer-div">
                                <label>Sergio Mercado</label>
                                <img class="Footer-img" width="100" src="{{ asset('img/foto-sergio.jpg') }}"
                                    alt="">
                            </div>
                            <div class="Footer-div">
                                <label>Dager Lopez</label>
                                <img class="Footer-img" width="100" src="{{ asset('img/foto-dager.png') }}"
                                    alt="">
                            </div>
                        </section>
                    </div>
                    <p class="copyright-text">Copyright &copy; 2023 - {{ date('Y') }} Evaluer. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @stack('scripts')
</body>

</html>
