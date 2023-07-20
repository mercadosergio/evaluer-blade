@extends('layout.app')

@section('content')

    <div class="Content-page">
        <div class="Title">
            <i class="Title-i bi bi-columns-gap"></i>
            <h1 class="Title-h1">{{ __('Titulo') }}</h1>
        </div>

        <div class="Courses-layout">
            @if ($courses && $courses->count() > 0)
                @foreach ($courses as $course)
                    <a class="Course-link" href="{{ route('courses.show', ['id' => $course->id]) }}">
                        <div class="Course-div">
                            <p class="Course-info-p">{{ $course->program }} Semestre: {{ $course->semester }}</p>
                            <h3 class="Course-subjet-h3">{{ $course->subject }}</h3>
                        </div>
                    </a>
                @endforeach
            @else
                <span class="center col-start-1 col-end-3"><em>No estás asociado a ningún curso.</em></span>
            @endif
        </div>

        <section class="Material-section">
            <div class="Title">
                <i class="bi bi-clock"></i>
                <h1 class="Title-h1">{{ __('Recientes') }}</h1>
            </div>
        </section>
        <section class="Post">
            <div class="Post-title">
                <i class="Post-i bi bi-card-heading"></i>
                <h1 class="Post-h1">Contenido</h1>
            </div>

            <div class="Post-info">
                <button class="drop-menu" type="button" data-bs-toggle="dropdown" aria-expanded="false"">
                    <i class=" bi bi-three-dots-vertical"></i>
                </button>

                <ul class="dropdown-menu">
                    <li><button class="dropdown-item Post-button--delete" href="#"><i class="bi bi-trash-fill"></i>
                            Eliminar</button></li>
                </ul>

                <div class="e1"><img class="Post-img--avatar" src="/avatar/default.png" /></div>
                <div class="e2">Arturo valdez</div>
                <div class="e3">
                    <p>19/02/2022</p>
                </div>
                <div class="e4">
                    <p>
                    <h3>Lorem ipsum dolor sit amet</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sodales consectetur nisi ac sodales.
                        Sed congue lobortis vestibulum. Vestibulum et arcu convallis, consectetur leo ac, euismod lorem.
                        Etiam aliquam auctor cursus. Proin posuere enim vel fringilla elementum. Vestibulum scelerisque
                        viverra gravida.</p>
                    </p>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('styles')
    @vite('resources/css/advisor.dashboard.css')
@endpush

@push('scripts')
    @vite('resources/js/advisor.dashboard.js')
@endpush
