@extends('layout.app')
@section('title', 'Formulario de propuesta')

@section('content')

    <section class="Main-section">
        <form novalidate method="POST" action="{{ route('store.submission') }}" id="form-propuesta">
            @csrf
            <article class="General-article">
                <div class="Head">
                    <div class="Title">
                        <h1 class="Head-h1"><i class="fas fa-network-wired"></i> Datos generales de la propuesta</h1>
                    </div>
                    <p class="Head-p">
                        Diligencie la información correspondiente a su propuesta de grado, con los datos
                        requeridos
                        para registrar su idea investigativa.
                    </p>
                </div>

                <div class="Form-layout">
                    <div class="Form-field Col-1_3">
                        <label class="Form-label">Título del proyecto:</label>
                        <div id="inputDisplay">
                            <i class="bi bi-fonts"></i>
                            <input class="" type="text" class="campotexto" name="title">
                        </div>
                    </div>

                    <div class="Form-field Col-1_3">
                        <label class="Form-label">Linea de investigación:</label>
                        <div id="inputDisplay">
                            <i class="bi bi-bar-chart-steps"></i>
                            <select name="line">
                                <option selected value="123">Seleccione...</option>
                                @if ($lines && $lines->count() > 0)
                                    @foreach ($lines as $line)
                                        <option value="{{ $line->subline }}">{{ $line->subline }} - {{ $line->line }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="Form-field">
                        <label class="Form-label">Nombre del asesor:</label>

                        <div id="inputDisplay">
                            <i class="bi bi-person-check-fill"></i>
                            <input class="" type="text" readonly id="disable"
                                value="{{ $student->courses[0]->advisor->names }} {{ $student->courses[0]->advisor->first_lastname }}"
                                class="campotexto" name="advisor">
                        </div>
                    </div>

                    <div class="Form-field">
                        <label class="Form-label">Nombre completo del lider:</label>
                        <div id="inputDisplay">
                            <i class="bi bi-person-gear"></i>
                            <input class="" type="text" class="campotexto" name="leader">
                        </div>
                    </div>

                    <div class="Form-field">
                        <label class="Form-label">Programa:</label>
                        <div id="inputDisplay">
                            <i class="bi bi-journal-text"></i>
                            <input type="text" readonly name="program" id="disable"
                                value="{{ $student->program->name }}">
                        </div>
                    </div>
                    <div class="Form-field">
                        <label class="Form-label">Semestre:</label>
                        <div id="inputDisplay">
                            <i class="bi bi-hash"></i>
                            <input class="" readonly type="number" max="9" min="1" class="camponumero"
                                id="disable" name="semester" value="{{ $student->semester }}">
                        </div>
                    </div>
                    <div class="Form-field Col-1_3">
                        <label class="Form-label">Descripción:</label>
                        <i class="bi bi-card-text"></i>
                        <textarea cols="30" rows="6" name="description"></textarea>
                    </div>
                </div>
                <div class="Members-div">
                    <div class="Title">
                        <h2 class="Head-h1"><i class="fas fa-network-wired"></i> Integrantes</h2>
                    </div>
                    <div class="Members-layout">
                        <ul>
                            @foreach ($members as $member)
                                <li>{{ $loop->iteration }}. {{ $member->names }} {{ $member->first_lastname }}
                                    {{ $member->second_lastname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="Button-div">
                    <input type="hidden" name="team_id" value="{{ $student->teams[0]->id }}">
                    <input type="hidden" name="activity_id" value="{{ $activityId }}">
                    <button type="submit" name="send" class="button txt-white back-primary center">Enviar</button>
                </div>
            </article>
        </form>
    </section>

@endsection

@push('styles')
    @vite('resources/css/form.proposal.css')
@endpush
