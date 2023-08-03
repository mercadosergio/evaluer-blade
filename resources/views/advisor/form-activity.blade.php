@extends('layout.app')
@section('title', 'Nueva actividad')

@section('content')
    @include('components.shared.alerts')
    <section class="Form-section">
        <div class="Title">
            <h1 class="Title-h1">Nueva actividad</h1>
        </div>

        <form method="POST" action="{{ route('store.activity') }}" class="form" autocomplete="off" id="form-activity">
            @csrf
            <div class="Activity">
                <div class="Formulario-div">
                    <div class="Field Field--type">
                        <label for="">Seleccione el tipo de actividad</label>
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input class="Field-input" type="hidden" id="autocompleteId" name="type_id">

                        <input class="Field-input" type="text" id="autocompleteInput" name="typename">
                        <ul id="list">
                        </ul>
                    </div>
                    <div class="Field Field--title">
                        <label>Titulo:</label>
                        <input type="text" class="Field-input" value="" name="title">
                    </div>
                    <div class="Field Field--description">
                        <label>Descripcion:</label>
                        <textarea class="ckeditor Field-textarea" name="description" id="editor"></textarea>
                    </div>
                    <div class="Field--date">
                        <div class="Date-div">
                            <label for="">Disponible desde:</label>
                            <input type="datetime-local" name="available_from">
                        </div>
                        <div class="Date-div">
                            <label for="">Disponible hasta:</label>
                            <input type="datetime-local" name="available_until">
                        </div>
                    </div>
                    <div class="Formulario-button">
                        <button class="button txt-white bg-primary-100" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </form>

    </section>

@endsection

@push('styles')
    @vite('resources/css/new.activity.css')
@endpush

@push('scripts')
    @vite('resources/js/new.activity.js')
@endpush
