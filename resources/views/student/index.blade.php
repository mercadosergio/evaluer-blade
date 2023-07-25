@extends('layout.app')
@section('title', 'Inicio')

@section('content')
<section class="StudentModules">
    
    @if ($user->student && $user->student->courses->count() > 0)
    @foreach ($user->student->courses as $course)
    <div class="Title">
        <i class="Title-i bi bi-bar-chart-steps"></i>
        <h1 class="Title-h1">{{ $course->subject }}</h1>
    </div>
    <a class="Course-a">
        <div class="Course-container">
            <p>{{ $course->subject }}</p>
            <p>{{ $course->description }}</p>
        </div>
    </a>

    <div class="Title">
        <i class="Title-i bi bi-bar-chart-steps"></i>
        <h1 class="Title-h1">Equipo</h1>
    </div>
    <a href="{{ route('student.team', ['courseId' => $course->id ]) }}" class="button back-primary txt-white center">Inscribir grupo</a>

    <div class="Title">
        <i class="Title-i bi bi-bar-chart-steps"></i>
        <h1 class="Title-h1">Actividades</h1>
    </div>
    @if ($course->activities->count() > 0)
    <div class="Modules">
        @foreach ($course->activities as $activity)
        <a class="Activity-link" href="{{ route('student.activity', ['id' => $activity->id]) }}">
            <div class="Modules-div">
                <p class="">{{ $activity->title }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @else
    <span class="center"><em>No hay actividades en este curso.</em></span>
    @endif
    @endforeach
    @else
    <span class="center"><em>No estás inscrito en ningún curso.</em></span>
    @endif
</section>

<section class="Lesson">
    <div class="Lesson-title">
        <i class="Lesson-i bi bi-list-task"></i>
        <h1 class="Lesson-h1">Contenido del curso</h1>
    </div>
    @if ($user->student && $user->student->courses->count() > 0)
    @foreach ($user->student->courses as $course)
    @foreach ($course->posts as $post)
    <div class="Lesson-div">
        <p class="Lesson-p--name color-primary">{{ $post->names }}</p>
        <div>
            {!! $post->content !!}
        </div>
        <p class="Lesson-p--date"><em>{{ $post->created_at }}</em></p>
    </div>

    <div class="Lesson-div">
        <p class="Lesson-p--name">Sergio Mercado</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt id eum quod ab molestiae debitis. Maiores
            rerum, facilis vel dignissimos dolor omnis, illum voluptas ullam, dolores nihil expedita! Aut, iure.
            Pariatur debitis itaque quae esse? Exercitationem maxime accusamus magni tempore soluta mollitia iure
            ipsa alias, tempora non deleniti doloremque veritatis perferendis unde impedit reprehenderit eum nam
            aliquam ad recusandae esse!
            Optio, accusamus officia? Reiciendis accusantium vel, recusandae expedita quasi dolorem. Sunt nisi
            reiciendis eligendi unde accusamus consequatur dignissimos saepe minus necessitatibus ex expedita nulla
            placeat neque, ipsam maiores quaerat. Quam.
            Accusantium nisi, animi laborum illo sunt reprehenderit nostrum maxime eius. Quasi pariatur, vitae porro
            quis fugiat cumque laborum in beatae minima ex corrupti quam enim maxime eligendi, atque maiores.
            Facere?
            Mollitia veritatis error aspernatur nesciunt nulla totam. Amet nobis, accusantium, quae omnis temporibus
            nisi blanditiis nam minima, ea expedita voluptatem voluptates. Quasi, consectetur fugiat. Enim,
            asperiores unde. Repudiandae, nulla error!</p>
        <p class="Lesson-p--date"><em>12-02-2021</em></p>
    </div>
    @endforeach
    @endforeach
    @endif
</section>

<section class="Tree">
    <details open="open">
        <summary>General</summary>
        <div class="folder">
            <p><i class="bi bi-bell-fill" style="margin-right: 3px;"></i><a href="">Anuncios</a></p>
            <p><i class="bi bi-journal-richtext" style="margin-right: 3px;"></i><a target="_blank" href="../../guide/Manual-de-usuario.pdf">Manual de usuario</a></p>
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
</section>
@endsection

@push('styles')
@vite('resources/css/student.dashboard.css')
@endpush