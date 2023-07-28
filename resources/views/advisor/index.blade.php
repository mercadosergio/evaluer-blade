@extends('layout.app')
@section('title', 'Asesor de investigación')

@section('content')
    <div class="Content-page grid grid-cols-4 gap-5">
        <div class="Courses col-span-3">
            <div class="Title">
                <i class="Title-i bi bi-columns-gap"></i>
                <h1 class="Title-h1">{{ __('Cursos') }}</h1>
            </div>
            <div class="Courses-layout">
                @if ($courses && $courses->count() > 0)
                    @foreach ($courses as $course)
                        <a class="Course-link" href="{{ route('advisor.course', ['id' => $course->id]) }}">
                            <div class="Course-div">
                                <h3 class="Course-h3">{{ $course->subject }}</h3>
                                <div class="Course-body">
                                    <p class="Course-program-p">{{ $course->program->name }}</p>
                                    <p class="Course-semester-p">Semestre: {{ $course->semester }}</p>
                                    <p class="Course-description-p">{{ $course->description }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <span class="center col-start-1 col-end-3"><em>No estás asociado a ningún curso.</em></span>
                @endif
            </div>
        </div>
        <div class="Datetimes">
            <div class="Title">
                <i class="bi bi-clock"></i>
                <h1 class="Title-h1">{{ __('Fechas programadas') }}</h1>
            </div>
            <div class="flex flex-col bg-white border border-gray-200 rounded-md p-3">
                @if (isset($totalActivities) && $totalActivities->count() > 0)
                    @foreach ($totalActivities as $activity)
                        <div class="">
                            <span>{{ date('d/m/Y g:i a', $activity->available_until) }}</span>
                            <p>{{ $activity->title }}</p>
                        </div>
                    @endforeach
                @else
                    <span class="center"><em>No hay aproximadas</em></span>
                @endif
            </div>
        </div>

        <div class="Material-section col-span-2">
            <div class="Title">
                <i class="bi bi-clock"></i>
                <h1 class="Title-h1">{{ __('Recientes') }}</h1>
            </div>
        </div>
        <div class="Post col-span-2">
            <div class="Title">
                <i class="bi bi-card-heading"></i>
                <h1 class="Title-h1">Contenido</h1>
            </div>
            <div class="Post-info flex flex-col">
                <div class="drop-menu">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button type="button" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <i class=" bi bi-three-dots-vertical"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-trash-fill"></i>
                                {{ __('Eliminar') }}
                            </x-dropdown-link>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="flex space-x-4">
                    <img class="Post-img--avatar" src="{{ asset('avatar/default.png') }}" />
                    <div class="flex flex-col">
                        <p class="my-auto font-semibold">Arturo valdez</p>
                        <p class="my-auto">19/02/2022</p>
                    </div>
                </div>
                <div class="">
                    <p>
                    <h3>Lorem ipsum dolor sit amet</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sodales consectetur nisi ac sodales.
                        Sed congue lobortis vestibulum. Vestibulum et arcu convallis, consectetur leo ac, euismod lorem.
                        Etiam aliquam auctor cursus. Proin posuere enim vel fringilla elementum. Vestibulum scelerisque
                        viverra gravida.</p>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    @vite('resources/css/advisor.dashboard.css')
@endpush

@push('scripts')
    @vite('resources/js/advisor.dashboard.js')
@endpush
