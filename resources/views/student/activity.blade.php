@extends('layout.app')
@section('title', 'Detalles de la actividad')

@section('content')
    <section class="w-4/5 m-auto">
        @include('components.shared.alerts')
        <div class="Title">
            <i class="bi bi-list-check"></i>
            <h1 class="Title-h1">{{ $activity->title }}</h1>
        </div>
        <div class="py-5 px-10 bg-white rounded items-center static-card-rounded">
            <p class="text-lg font-medium">{{ $activity->description }}</p>
            <div class="flex justify-evenly mt-4">
                <div class="bg-[#e9e9e9e9] rounded-md flex flex-col py-7 px-5">
                    <label for="">Disponible desde:</label>
                    <p>
                        {{ date('d/m/Y g:i a', $activity->available_from) }}
                    </p>
                </div>
                <div class="bg-[#e9e9e9e9] rounded-md flex flex-col py-7 px-5">
                    <label for="">Disponible hasta:</label>
                    <p>
                        {{ date('d/m/Y g:i a', $activity->available_until) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col my-4 py-6 px-10 bg-white rounded items-center static-card-rounded">
            @switch($activity->type_id)
                @case(1)
                    @if (isset($submission) && isset($submission->proposal))
                        <div class="w-4/5 m-auto flex flex-col">
                            <div class="grid">
                                <div class="flex justify-center items-center border border-solid border-black p-2">
                                    <img src="{{ asset('img/aunar-logo-3.png') }}" alt="" width="200">
                                </div>
                                <div class="flex justify-center items-center border border-solid border-black p-2 font-semibold">
                                    CORPORACION UNIVERSITARIA AUTONOMA DE NARIÑO EXTENSIÓN CARTAGENA
                                </div>
                                <div
                                    class="col-span-2 flex justify-center items-center border border-solid border-black p-2 font-semibold text-center">
                                    PROPUESTA DE INVESTIGACIÓN
                                </div>
                            </div>
                            <div class="my-2 grid grid-cols-8">
                                <div class="col-start-1 col-end-4 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Título:</div>
                                <div class="col-start-4 col-end-9 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->title }}</div>
                                <div class="col-start-1 col-end-4 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Línea de
                                    investigación:</div>
                                <div class="col-start-4 col-end-9 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->line }}</div>
                                <div class="col-start-1 col-end-3 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Programa:</div>
                                <div class="col-start-3 col-end-6 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->program }}</div>
                                <div class="col-start-6 col-end-8 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Semestre:</div>
                                <div class="col-start-8 col-end-9 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->semester }}</div>
                                <div class="col-start-1 col-end-9 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Descripción:</div>
                                <div class="col-start-1 col-end-9 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->description }}</div>
                                <div class="col-start-1 col-end-3 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Nombre del asesor:
                                </div>
                                <div class="col-start-3 col-end-5 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->advisor }}</div>
                                <div class="col-start-5 col-end-7 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Nombre del lider de equipo:</div>
                                <div class="col-start-7 col-end-9 flex border border-solid border-black p-3">
                                    {{ $submission->proposal->leader }}</div>
                                <div class="col-start-1 col-end-9 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Integrantes</div>
                                <div class="col-start-1 col-end-3 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Número de integrantes:
                                </div>
                                <div class="col-start-3 col-end-9 flex border border-solid border-black p-3">{{ $team->n_members }}
                                </div>
                                <div class="col-start-1 col-end-3 flex border border-solid border-black p-3 bg-[#e7e6e6] font-bold">
                                    Nombre de integrantes:
                                </div>
                                <div class="col-start-3 col-end-9 flex border border-solid border-black p-3">
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
                            <a class="button bg-primary-100 text-white"
                                href="{{ route('proposal.form', ['id' => $activity->id]) }}">Ir al
                                formulario</a>
                        @else
                            <span class="center"><em>No se entregó la actividad</em></span>
                        @endif
                    @endif
                @break

                @case(2)
                    @if (isset($submission) && isset($submission->draft))
                        @if (time() > $activity->available_from)
                            <div class="bg-[#e9e9e9] rounded-md py-7 px-5 flex items-center">
                                <a class="text-red-600 text-4xl" href="{{ asset($submission->draft->path) }}" target="_blank"
                                    target="_blank">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                                <div>
                                    <span>{{ $submission->draft->filename }}</span>
                                    <p>Entregado: {{ date('d/m/Y g:i a', strtotime($submission->draft->created_at)) }}</p>
                                </div>
                            </div>
                        @endif
                    @else
                        @if (time() > $activity->available_until)
                            <span class="center"><em>No se entregó la actividad</em></span>
                        @else
                            <div class="flex items-center text-base">
                                <p><i class="bi bi-file-arrow-up"></i> Adjuntar entregable en este espacio.</p>
                            </div>
                            <form class="w-full flex flex-col justify-center" method="POST"
                                action="{{ route('store.submission') }}" id="draft-form" enctype="multipart/form-data">
                                @csrf
                                <div class="relative my-5 mx-auto w-2/3">
                                    <input {{ time() < $activity->available_from ? 'disabled' : '' }} type="file"
                                        class="relative w-full h-full left-0 top-0 right-0 bottom-0 z-10 opacity-0"
                                        id="upload_costum" name="pdf_file">

                                    <input type="hidden" value="{{ $activity->id }}" name="activity_id">
                                    <input type="hidden" value="{{ $activity->type_id }}" name="type_activity_id">
                                    <input type="hidden" value="{{ $team->id }}" name="team_id">

                                    <label for="upload_costum"
                                        class="bg-[rgb(243, 246, 253)] w-full border-2 border-dashed border-primary left-0 right-0 top-0 bottom-0 flex flex-col justify-center text-center rounded-lg">
                                        <div class="relative">
                                            <i class="text-4xl bi bi-file-earmark-text"></i>
                                            <p class="filename"></p>
                                            <button type="button"
                                                class="py-0.5 px-1 border-none bg-red-700 text-white rounded cursor-pointer z-10 absolute top-0.5 right-0.5 outline-none"><i
                                                    class="bi bi-x"></i></button>
                                        </div>
                                        <p class="text-gray-400 text-sm mt-7">Arrastrar y soltar para cargar archivo</p>
                                        <button type="button"
                                            class="w-52 h-12 border-none bg-gray-300 text-black rounded my-7 mx-auto pointer-events-none">Escoger
                                            archivo</button>
                                    </label>
                                </div>
                                <button id="send" type="submit" {{ time() < $activity->available_from ? 'disabled' : '' }}
                                    class="m-auto button txt-white bg-primary-100 text-white">
                                    Enviar
                                </button>
                            </form>
                        @endif
                    @endif
                @break

                @case(3)
                    @if (isset($submission) && isset($submission->researchProject))
                        @if (time() > $activity->available_from)
                            <div class="bg-[#e9e9e9] rounded-md py-7 px-5 flex items-center">
                                <a class="text-red-600 text-4xl" href="{{ asset($submission->researchProject->path) }}"
                                    target="_blank" target="_blank">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                                <div>
                                    <span>{{ $submission->researchProject->filename }}</span>
                                    <p>Entregado: {{ date('d/m/Y g:i a', strtotime($submission->researchProject->created_at)) }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @else
                        @if (time() > $activity->available_until)
                            <span class="center"><em>No se entregó la actividad</em></span>
                        @else
                            <div class="flex items-center text-base">
                                <p><i class="bi bi-file-arrow-up"></i> Adjuntar entregable en este espacio.</p>
                            </div>
                            <form class="w-full flex flex-col justify-center" method="POST"
                                action="{{ route('store.submission') }}" id="draft-form" enctype="multipart/form-data">
                                @csrf
                                <div class="relative my-5 mx-auto w-2/3">
                                    <input {{ time() < $activity->available_from ? 'disabled' : '' }} type="file"
                                        class="relative w-full h-full left-0 top-0 right-0 bottom-0 z-10 opacity-0"
                                        id="upload_costum" name="pdf_file">

                                    <input type="hidden" value="{{ $activity->id }}" name="activity_id">
                                    <input type="hidden" value="{{ $activity->type_id }}" name="type_activity_id">
                                    <input type="hidden" value="{{ $team->id }}" name="team_id">

                                    <label for="upload_costum"
                                        class="bg-[rgb(243, 246, 253)] w-full border-2 border-dashed border-primary left-0 right-0 top-0 bottom-0 flex flex-col justify-center text-center rounded-lg">
                                        <div class="relative">
                                            <i class="text-4xl bi bi-file-earmark-text"></i>
                                            <p class="filename"></p>
                                            <button type="button"
                                                class="py-0.5 px-1 border-none bg-red-700 text-white rounded cursor-pointer z-10 absolute top-0.5 right-0.5 outline-none">
                                                <i class="!text-sm bi bi-x"></i>
                                            </button>
                                        </div>
                                        <p class="text-gray-400 text-sm mt-7">Arrastrar y soltar para cargar archivo</p>
                                        <button type="button"
                                            class="w-52 h-12 border-none bg-gray-300 text-black rounded my-7 mx-auto pointer-events-none">Escoger
                                            archivo</button>
                                    </label>
                                </div>
                                <button id="send" type="submit" {{ time() < $activity->available_from ? 'disabled' : '' }}
                                    class="Send-button button txt-white bg-primary-100 text-white">Enviar</button>
                            </form>
                        @endif
                    @endif
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
