@extends('layout.app')

@section('content')

<div class="Content-page">
    <div class="Title">
        <i class="Title-i bi bi-columns-gap"></i>
        <h1 class="Title-h1">Cursos</h1>
    </div>

    <div class="Courses-layout">
        @if ($courses && $courses->count() > 0)
        @foreach ($courses as $course)
        <a href="{{ route('courses.show', ['id' => $course->id]) }}">
            <div class="Course-div">
                <h3 class="Course-name">{{ $course->name }}</h3>
                <p>{{ $course->program }} Semestre: {{ $course->semester }}</p>
            </div>
        </a>
        @endforeach
        @else
        <span class="center"><em>No estás asociado a ningún curso.</em></span>
        @endif
    </div>


    <section class="Post">
        <div class="Post-title">
            <i class="Post-i bi bi-card-heading"></i>
            <h1 class="Post-h1">Contenido</h1>
        </div>

        <div class="Post-content">
            <button class="Post-button button-active button back-primary txt-white" id="new-post">Publicar un anuncio</button>
            <form class="post_form" id="form-post" action="" method="POST">
                @csrf
                <input type="text" name="advisor_id" value="{{ $advisor->id }}">
                <input type="text" name="names" value="{{ $advisor->names }}">
                <div class="form-group">
                    <textarea require name="content" class="ckeditor Post-textarea" id="editor"></textarea>
                </div>
                <button type="submit" class="Post-button button back-primary txt-white" name="submit" id="action">Publicar</button>
            </form>
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
