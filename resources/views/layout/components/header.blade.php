<header class="Header bg-primary-100">
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
            <a class="navbar-brand" href="{{ route('dashboards') }}">
                <img src="{{ asset('img/evaluer-logo-2.png') }}" class="logo-evaluer">
            </a>
        </div>
        <!-- Escritorio design -->
        <ul class="Header-ul desktop-display text-white">
            <li class="Header-li"><a class="Header-a" href="">Inicio</a></li>
            @if (auth()->user()->role_id == 1 &&
                    auth()->user()->student->courses->count() > 0)
                <li class="Header-li">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="transition flex items-center w-full justify-center gap-x-1.5">
                                {{ __('Cursos') }}
                                <svg class="-mr-1 h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div id="tabs-dropdown">
                                @foreach (auth()->user()->student->courses as $course)
                                    <x-dropdown-link class="flex items-center"
                                        href="{{ route('student.dashboard') }}#tab{{ $course->id }}">
                                        {{ $course->period->year }} - {{ $course->period->term }}
                                    </x-dropdown-link>
                                @endforeach
                                <x-dropdown-link class="flex items-center" href="#tab2">
                                    ohla
                                </x-dropdown-link>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </li>
            @endif
        </ul>

        @auth
            <div class="Dropdown">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-semibold border-2 border-transparent rounded-full focus:outline-none text-white focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover flex items-center space-x-2"
                                src="{{ filter_var(Auth::user()->profile_photo_path, FILTER_VALIDATE_URL) ? Auth::user()->profile_photo_path : asset('avatar/' . Auth::user()->profile_photo_path) }}"
                                alt="{{ Auth::user()->name }}" />
                            <span class="Avatar-span">{{ Auth::user()->name }}</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ Auth::user()->name }}
                        </div>

                        <x-dropdown-link class="flex items-center" href="{{ route('profile.show') }}">
                            Mi Perfil
                        </x-dropdown-link>

                        <x-dropdown-link class="flex items-center" href="{{ route('profile.show') }}">
                            <i class="Dropdown-i bi bi-gear"></i>
                            <span>Configuración</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link class="flex items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="Dropdown-i bi bi-box-arrow-left"></i>
                                Cerrar Sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth

    </nav>
</header>
