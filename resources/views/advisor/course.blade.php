@extends('layout.app')

@section('title', 'Curso - ' . $course->subject)

@section('content')
    @include('components.shared.alerts')
    <div class="General">
        <div class="Title">
            <h1 class="Title-h1">{{ $course->subject }}</h1>
        </div>
        <div class="Layout">
            <section class="Courses-section">
                <div class="prog">
                    <p>{{ $course->program->name }} - </p>
                    <p>{{ $course->semester }}</p>
                </div>
                <p class="desc">{{ $course->description }}</p>
            </section>
            <section class="w-full">
                <div class="Title">
                    <i class="bi bi-card-heading"></i>
                    <h1 class="Title-h1">Actividades</h1>
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

            <section class="">
                <div class="Title">
                    <i class="bi bi-card-heading"></i>
                    <h1 class="Title-h1">Contenido</h1>
                </div>

                <div class="Post-content">
                    <button class="Post-button button-active button txt-white bg-primary-100" id="new-post">Publicar un
                        anuncio</button>
                    <form class="post_form" id="form-post" method="POST" action="{{ route('store.post') }}">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="advisor_id" value="{{ Auth::user()->advisor->id }}">
                        <div class="form-group">
                            <textarea require name="content" class="ckeditor Post-textarea" id="editor"></textarea>
                        </div>
                        <button type="submit" class="Post-button button txt-white bg-primary-100"
                            id="action">Publicar</button>
                    </form>
                </div>
                @if ($course->posts->count() > 0)
                    @foreach ($course->posts as $post)
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
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                            <div class="flex space-x-4">
                                <img class="Post-img--avatar rounded-full"
                                    src="{{ asset('avatar/' . $post->advisor->user->avatar) }}" />
                                <div class="flex flex-col">
                                    <p class="my-auto font-semibold">{{ $post->advisor->names }}
                                        {{ $post->advisor->first_lastname }}</p>
                                    <p class="my-auto">{{ $post->created_at }}</p>
                                </div>
                            </div>
                            <div class="">
                                {!! $post->content !!}
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
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    @vite('resources/js/course.advisor.js')
@endpush
