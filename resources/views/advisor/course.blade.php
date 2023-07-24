@extends('layout.app')

@section('content')

    <div class="General">
        <div class="Title">
            <h1 class="Title-h1">{{ $course->subject }}</h1>
        </div>
        <div class="Layout">
            <section class="Courses-section">
                <div class="prog">
                    <p>{{ $course->program }} - </p>
                    <p>{{ $course->semester }}</p>
                </div>
                <p class="desc">{{ $course->description }}</p>
            </section>
            <section class="Activities">
                <div class="Post-title">
                    <i class="Post-i bi bi-card-heading"></i>
                    <h1 class="Post-h1">Actividades</h1>
                    <a class="button txt-white back-success move-right"
                        href="{{ route('create.activity', ['courseId' => $course->id]) }}">Nueva</a>
                </div>

                @if ($activities->count() > 0)
                    @foreach ($activities as $activity)
                        <a href="{{ route('advisor.activity', ['id' => $activity->id]) }}">
                            <div class="Activity-container">
                                <p>{{ $activity->title }}</p>
                            </div>
                        </a>
                    @endforeach
                @else
                    <span class='center'><em>No hay actividades en este curso.</em></span>
                @endif

            </section>
            <section class="Info">
                <h3 class="Counter-h3">Total de estudiantes: {{ $course->students->count() }}</h3>
                <ul class="StudentList">
                    @foreach ($course->students as $student)
                        <li>{{ $student->names }} {{ $student->first_lastname }}</li>
                    @endforeach
                </ul>
            </section>

            <section class="Post">
                <div class="Post-title">
                    <i class="Post-i bi bi-card-heading"></i>
                    <h1 class="Post-h1">Contenido</h1>
                </div>

                <div class="Post-content">
                    <button class="Post-button button-active button txt-white back-primary" id="new-post">Publicar un
                        anuncio</button>
                    <form class="post_form" id="form-post" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="names" value="{{ $course->id }}">
                        <input type="hidden" name="avatar" value="{{ $course->id }}">
                        <div class="form-group">
                            <textarea require name="content" class="ckeditor Post-textarea" id="editor"></textarea>
                        </div>
                        <button type="submit" class="Post-button button txt-white back-primary"
                            id="action">Publicar</button>
                    </form>
                </div>
                @if ($course->posts->count() > 0)
                    @foreach ($course->posts as $post)
                        <div class="Post-info">
                            <button class="drop-menu" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class=" bi bi-three-dots-vertical"></i>
                            </button>

                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item Post-button--delete" href="#"><i
                                            class="bi bi-trash-fill"></i>
                                        Eliminar</button></li>
                            </ul>

                            <div class="e1"><img class="Post-img--avatar"
                                    src="{{ asset('avatar/' . $post->avatar) }}" /></div>
                            <div class="e2">{{ $post->names }}</div>
                            <div class="e3">
                                <p>{{ $post->created_at }}</p>
                            </div>
                            <div class="e4">
                                <div>
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <span class='center'><em>No hay anuncios en este curso.</em></span>
                @endif
            </section>
        </div>
    </div>

@endsection

@push('styles')
    @vite('resources/css/course.advisor.css')
@endpush

@push('scripts')
    @vite('resources/js/course.advisor.js')
@endpush
