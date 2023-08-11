<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Evaluer') | Evaluer</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/css/layout.css', 'resources/js/header.js', 'resources/js/app.js'])
    @stack('styles')

</head>

<body>
    @include('layout.components.header')

    <div class="Screen">
        @livewire('admin-sidebar')
        @vite('resources/css/admin.sidebar.css')

        <main class="desktop:mt-[90px] p-5">
            @yield('content')
        </main>
    </div>

    @include('components.shared.footer')
    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @stack('scripts')
</body>

</html>
