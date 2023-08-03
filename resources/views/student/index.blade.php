@extends('layout.app')
@section('title', 'Inicio')

@section('content')
    @include('components.shared.alerts')

    <section class="flex flex-col laptop:grid laptop:gap-7">
        <div class="flex flex-col">
            @if ($courses = $user->student->courses)
                <div class="rounded border w-full">
                    <!-- Tabs -->
                    <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
                        @foreach ($courses as $course)
                            <li>
                                <a id="default-tab" href="#tab{{ $course->id }}">{{ $course->period->year }} -
                                    {{ $course->period->term }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tab Contents -->
                    <div id="tab-contents">
                        @foreach ($courses as $course)
                            <div id="tab{{ $course->id }}" class="tab-div p-4">
                                <div class="Title">
                                    <i class="Title-i bi bi-bar-chart-steps"></i>
                                    <h1 class="Title-h1">{{ $course->subject }}</h1>
                                </div>
                                <div class="my-2 p-3 bg-white rounded items-center card-rounded">
                                    <p>{{ $course->description }}</p>
                                </div>
                                @if ($team = $user->student->teams[0])
                                    <div class="Title">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                                            </path>
                                        </svg>
                                        <h1 class="Title-h1">Mi grupo</h1>
                                    </div>
                                    <div class="rounded border-none bg-white py-3 px-4 ring-1 ring-gray-200">
                                        <ul>
                                            @foreach ($team->students as $student)
                                                <li>{{ $student->names }} {{ $student->first_lastname }}
                                                    {{ $student->second_lastname }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="Title">
                                        <i class="Title-i bi bi-bar-chart-steps"></i>
                                        <h1 class="Title-h1">Actividades</h1>
                                    </div>
                                    @if ($course->activities->count() > 0)
                                        <div class="flex flex-col">
                                            @foreach ($course->activities as $activity)
                                                <a class="my-1"
                                                    href="{{ route('student.activity', ['id' => $activity->id]) }}">
                                                    <div
                                                        class="Modules-div bg-white flex p-3 rounded items-center card-rounded">
                                                        <p class="font-medium">{{ $activity->title }}</p>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="center"><em>No hay actividades en este curso.</em></span>
                                    @endif
                                @else
                                    @livewire('team-modal', ['course' => $course])
                                @endif
                                <div class="Title">
                                    <i class="bi bi-list-task"></i>
                                    <h1 class="Title-h1">Contenido del curso</h1>
                                </div>
                                @if (isset($course))
                                    @foreach ($course->posts as $post)
                                        <div
                                            class="static-card-rounded bg-white text-justify rounded my-2 py-4 px-5 flex flex-col">
                                            <p class="text-lg font-medium color-primary">{{ $post->advisor->names }}
                                                {{ $post->advisor->first_lastname }}</p>
                                            <div>
                                                {!! $post->content !!}
                                            </div>
                                            <p class="ml-auto"><em>{{ $post->created_at }}</em></p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <span class="center"><em>No estás inscrito en ningún curso.</em></span>
            @endif
        </div>

        <div class="flex flex-col">

        </div>

        <div class="hidden laptop:block col-start-2 row-start-1 row-end-3">
            <details open="open">
                <summary>General</summary>
                <div class="folder">
                    <p><i class="bi bi-bell-fill" style="margin-right: 3px;"></i><a href="">Anuncios</a></p>
                    <p><i class="bi bi-journal-richtext" style="margin-right: 3px;"></i><a target="_blank"
                            href="../../guide/Manual-de-usuario.pdf">Manual de usuario</a></p>
                </div>
            </details>
            <details open="open">
                <summary>Guía de investigación</summary>
                <div class="folder">
                    <details open="open">
                        <summary>Académico</summary>
                        <div class="folder">

                        </div>
                    </details>
                </div>
            </details>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/student.dashboard.css')
@endpush
@push('scripts')
    @vite('resources/js/student.dashboard.js')
@endpush
