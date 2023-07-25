@extends('layout.app')
@section('title', 'Coordinador | Dashboard')

@section('content')
    <section class="General">
        <div class="Title">
            <i class="Title-i bi bi-columns-gap"></i>
            <h1 class="Title-h1">Coordinación académica</h1>
        </div>
        <div class="Layout">
            <div class="Module-div">
                <span>Resumen del programa</span>
                <p>Estudiantes matriculados: {{ $program->students->count() }}</p>
                <p>Asesores: {{ $program->advisors->count() }}</p>
            </div>
            <div class="Module-div">
                <span>Cursos</span>
                <p>Cursos activos: {{ $program->courses->count() }}</p>
            </div>
            <div class="Module-div">
                <span>Información del cuerpo asesor</span>
            </div>
            <div class="Module-div">
                <span>Gestión de documentos</span>
            </div>
            <div class="Module-div">
                <span>Lineas de investigación</span>
            </div>
            <div class="Module-div">
                <span>Asignar jurado de evaluación</span>
            </div>
        </div>
        {{-- <div class="Modules">
            <a href="">
                <div class="Modules-container">
                    <h1 class="Modules-h1">Marco de investigación</h1>
                    <img class="Modules-img" src="{{ asset('img/investigation.png') }}" alt="">
                </div>
            </a>
            <a href="">
                <div class="Modules-container">
                    <h1 class="Modules-h1">Asignar asesor</h1>
                    <img class="Modules-img" src="{{ asset('img/discussion.png') }}" alt="">
                </div>
            </a>
            <a href="">
                <div class="Modules-container">
                    <h1 class="Modules-h1">Asignar Jurado</h1>
                    <img class="Modules-img" src="{{ asset('img/judge.png') }}" alt="">
                </div>
            </a>
        </div> --}}
    </section>
@endsection

@push('styles')
    @vite('resources/css/dean.dashboard.css')
@endpush
