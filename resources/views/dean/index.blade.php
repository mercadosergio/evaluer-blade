@extends('layout.app')

@section('content')
    <section class="General">
        <div class="Title">
            <i class="Title-i bi bi-columns-gap"></i>
            <h1 class="Title-h1">Coordinación académica</h1>
        </div>

        <div class="Modules">
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
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/dean.dashboard.css')
@endpush
