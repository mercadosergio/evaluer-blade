@extends('layout.app')

@section('title', 'Equipo de trabajo')

@section('content')

<section class="Main-section">
    <div class="Title">
        <h1>Equipo</h1>
    </div>
    <div class="Content">
        <form class="form" method="POST" action="{{ route('store.team') }}" id="form-group" autocomplete="off">
            @csrf
            <h3 class="text-center">Grupo de trabajo</h3>
            <!-- Progress bar -->
            <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active" data-title="Introducción"></div>
                <div class="progress-step" data-title="Número de integrantes"></div>
                <div class="progress-step" data-title="Información"></div>
            </div>

            <!-- Steps -->
            <div class="form-step form-step-active">
                <div class="content">
                    <div class="Step1">
                        <img src="{{ asset('img/team1.png') }}" alt="">
                        Inscriba su grupo de trabajo para el curso actual
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-next width-50 ml-auto button">Siguiente<i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="form-step">
                <div class="content">
                    <div class="Step2">
                        <label>Número de integrantes:</label>
                        <div id="contenedorInput" class="selector">
                            <select id="countList" name="counter">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev button"><i class="bi bi-arrow-left"></i></i>Atrás</a>
                    <a href="#" class="btn btn-next button">Siguiente<i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="form-step">

                <div class="content">
                    <input id="courseId" type="hidden" value="{{ $course->id }}" name="course_id">
                    <div id="fields"></div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev button"><i class="bi bi-arrow-left"></i></i>Atrás</a>
                    <button type="submit" class="btn  button" name="save">Aceptar</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push('styles')
@vite('resources/css/team.student.css')
@endpush

@push('scripts')
@vite('resources/js/team.student.js')
@endpush