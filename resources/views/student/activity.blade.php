@extends('layout.app')
@section('title', 'Detalles de la actividad')

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
                        {{ date('d/m/Y g:i a', $activity->available_from) }}
                    </p>
                </div>
                <div class="Timelapse-container">
                    <label for="">Disponible hasta:</label>
                    <p>
                        {{ date('d/m/Y g:i a', $activity->available_until) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="Form-container">
            @switch($activity->type_id)
                @case(1)
                    @if (isset($submission))
                        <div class="Proposal-details">
                            <div class="Proposal-head">
                                <div class="content-center">
                                    <img src="{{ asset('img/aunar-logo-3.png') }}" alt="" width="200">
                                </div>
                                <div class="content-center">
                                    CORPORACION UNIVERSITARIA AUTONOMA DE NARIÑO EXTENSIÓN CARTAGENA
                                </div>
                                <div class="content-center column-1-3">
                                    PROPUESTA DE INVESTIGACIÓN
                                </div>
                            </div>
                            <div class="Proposal-body">
                                <div class="column-1-4 gray">Título:</div>
                                <div class="column-4-9">{{ $submission->proposal->title }}</div>
                                <div class="column-1-4 gray">Línea de investigación:</div>
                                <div class="column-4-9">{{ $submission->proposal->line }}</div>

                                <div class="column-1-3 gray">Programa:</div>
                                <div class="column-3-6">{{ $submission->proposal->program }}</div>
                                <div class="column-6-8 gray">Semestre:</div>
                                <div class="column-8-9">{{ $submission->proposal->semester }}</div>
                                <div class="column-1-9 gray content-center">Descripción:</div>
                                <div class="column-1-9">{{ $submission->proposal->description }}</div>
                                <div class="column-1-3 gray">Nombre del asesor:</div>
                                <div class="column-3-5">{{ $submission->proposal->advisor }}</div>
                                <div class="column-5-7 gray">Nombre del lider de equipo:</div>
                                <div class="column-7-9">{{ $submission->proposal->leader }}</div>
                                <div class="column-1-9 gray">Integrantes</div>
                                <div class="column-1-3 gray">Número de integrantes:</div>
                                <div class="column-3-9">{{ $team->n_members }}</div>
                                <div class="column-1-3 gray">Nombre de integrantes:</div>
                                <div class="column-3-9">
                                    <ul>
                                        @foreach ($team->students as $index => $student)
                                            <li>{{ $index + 1 }}. {{ $student->names }} {{ $student->first_lastname }}
                                                {{ $student->second_lastname }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        @if (time() > $activity->available_from || time() < $activity->available_until)
                            <a class="button back-primary" href="{{ route('proposal.form', ['id' => $activity->id]) }}">Ir al
                                formulario</a>
                        @else
                            <span class="center"><em>No se entregó la actividad</em></span>
                        @endif
                    @endif
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
                                    <p>Entregado: {{ date('d/m/Y g:i a', strtotime($draft->created_at)) }}</p>
                                </div>
                            </div>
                        @endif
                    @else
                        @if (time() > $activity->available_until)
                            <span class="center"><em>No se entregó la actividad</em></span>
                        @else
                            <div class="Detail">
                                <p><i class="bi bi-file-arrow-up"></i> Adjuntar entregable en este espacio.</p>
                            </div>
                            <form method="POST" autocomplete="off" id="draft-form">
                                <div class="DragDrop-container">
                                    <input {{ time() < $activity->available_from ? 'disabled' : '' }} type="file"
                                        class="upload_hide" id="upload_costum" name="pdf_file">

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
                                <button type="submit" {{ time() < $activity->available_from ? 'disabled' : '' }}
                                    class="Send-button button txt-white back-primary">Enviar</button>
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
    @vite('resources/css/student.activity.css')
@endpush

@push('scripts')
    @vite('resources/js/student.activity.js')
@endpush
