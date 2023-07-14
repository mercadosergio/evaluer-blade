<link href="{{ asset('css/activity.student.css') }}" rel="stylesheet">

@extends('layout.app')

@section('content')

<section class="View-section">
    <div class="Title">
        <i class="bi bi-list-check"></i>
        <h1 class="Title-h1">{{ $activity->title }}</h1>
    </div>
    <div class="Details-container">
        <p class="Details-p">{{ $activity->description }}</p>
        <div class="Date">
            <div class="Timelapse-container">
                <label for="">Disponible desde:</label>
                <p>
                    {{ date("d/m/Y g:i a", $activity->available_from) }}
                </p>
            </div>
            <div class="Timelapse-container">
                <label for="">Disponible hasta:</label>
                <p>
                    {{ date("d/m/Y g:i a", $activity->available_until) }}
                </p>
            </div>
        </div>
    </div>
    <div class="Form-container">
        @switch($activity->type_id)
        @case(1)
        <div>
            PORPEAAAAAA
        </div>
        @break

        @case(2)
            @if ($draft)
                @if (time() > $activity->available_from)
                <div class="Sent-info">
                    <a class="Sent-file-a" href="PAAAAAAAAAAAAAAAAAAAAAAAAAAAT" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    <div>
                        <span>{{ $draft->filename }}</span>
                        <p>Entregado: {{ date("d/m/Y g:i a", strtotime($draft->created_at)) }}</p>
                    </div>
                </div>
                @endif
            @else
                @if(time() > $activity->available_until)
                <span class="center"><em>No se entregó la actividad</em></span>
                @else
                <div class="Detail">
                    <p><i class="bi bi-file-arrow-up"></i> Adjuntar entregable en este espacio.</p>
                </div>
                <form method="POST" autocomplete="off" id="draft-form">
                    <div class="DragDrop-container">
                        <input {{ (time() < $activity->available_from) ? 'disabled' : '' }} type="file" class="upload_hide" id="upload_costum" name="pdf_file">

                        <input type="hidden" value="{{ $activity->id }}" name="activity_id">
                        <input type="hidden" value="{{ $team->id }}" name="team_id">

                        <label for="upload_costum" class="upload_label">
                            <div class="Preview">
                                <i class="bi bi-file-earmark-text"></i>
                                <p class="filename"></p>
                                <button class="Delete-file-button"><i class="bi bi-x"></i></button>
                            </div>
                            <p class="drag_text">Arrastrar y soltar para cargar archivo</p>
                            <button class="Choose-file-button">Escoger archivo</button>
                        </label>
                    </div>
                    <button type="submit" {{ (time() < $activity->available_from) ? 'disabled' : '' }} class="Send-button button-default primary-button">Enviar</button>
                </form>
                @endif
            @endif
        @break

        @case(3)
        <div>PROYECYO</div>
        @break

        @default
        @break
        @endswitch
    </div>
</section>

@endsection

@push('styles')
@vite('resources/css/activity.student.css')
@endpush