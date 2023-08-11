@extends('layout.app')
@section('title', 'Formulario de propuesta')

@section('content')

    <section class="w-full laptop:w-11/12 m-auto">
        <div class="Title">
            <i class="fas fa-network-wired"></i>
            <h1 class="Title-h1">Datos generales de la propuesta</h1>
        </div>
        <form class="py-4 px-5 tablet:py-5 tablet:px-7 laptop:px-12 desktop:py-8 desktop:px-16 rounded bg-white shadow-2xl"
            method="POST" action="{{ route('store.submission') }}" id="form-propuesta">
            @csrf
            <article class="General-article">
                <div class="mb-5">
                    <p class="desktop:text-lg">
                        Diligencie la información correspondiente a su propuesta de grado, con los datos
                        requeridos
                        para registrar su idea investigativa.
                    </p>
                </div>

                <div class="flex flex-col tablet:grid tablet:grid-cols-4 tablet:gap-x-7 tablet:gap-y-3 laptop:gap-y-4">
                    <div class="my-2 tablet:my-0 col-span-4">
                        <label class="text-lg font-semibold">Título del proyecto:</label>
                        <div class="relative Field-container">
                            <i class="text-gray-400 text-xl absolute top-1/2 -translate-y-1/2 py-1 px-2 bi bi-fonts"></i>
                            <input
                                class="w-full rounded border-0 py-1.5 px-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                                type="text" class="campotexto" name="title" value="{{ old('title') }}">
                        </div>
                    </div>

                    <div class="my-2 tablet:my-0 col-span-4">
                        <label class="text-lg font-semibold">Linea de investigación:</label>
                        <div class="relative Field-container">
                            <i
                                class="text-gray-400 text-xl absolute top-1/2 -translate-y-1/2 py-1 px-2 bi bi-bar-chart-steps"></i>
                            <select
                                class="w-full rounded border-0 py-1.5 px-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                                name="line">
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

                    <div class="my-2 tablet:my-0 col-start-1 col-end-3">
                        <label class="text-lg font-semibold">Nombre del asesor:</label>

                        <div class="relative">
                            <i
                                class="text-gray-400 text-xl absolute top-1/2 -translate-y-1/2 py-1 px-2 bi bi-person-check-fill"></i>
                            <input
                                class="bg-gray-100 w-full rounded border-0 py-1.5 px-3 pl-10 text-gray-900 ring-1 ring-gray-300 focus:ring-gray-300 placeholder:text-gray-400 tablet:text-sm tablet:leading-6"
                                type="text" readonly id="disable"
                                value="{{ $student->courses[0]->advisor->names }} {{ $student->courses[0]->advisor->first_lastname }}"
                                class="campotexto" name="advisor">
                        </div>
                    </div>

                    <div class="my-2 tablet:my-0 col-start-3 col-end-5">
                        <label class="text-lg font-semibold">Nombre completo del lider:</label>
                        <div class="relative Field-container">
                            <i
                                class="text-gray-400 text-xl absolute top-1/2 -translate-y-1/2 py-1 px-2 bi bi-person-gear"></i>
                            <input
                                class="w-full rounded border-0 py-1.5 px-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                                type="text" class="campotexto" name="leader"value="{{ old('leader') }}">
                        </div>
                    </div>

                    <div class="my-2 tablet:my-0 col-start-1 col-end-4 flex items-center">
                        <label class="text-lg font-semibold mr-3">Programa:</label>
                        <div class="relative flex-1">
                            <i
                                class="text-gray-400 text-xl absolute top-1/2 -translate-y-1/2 py-1 px-2 bi bi-journal-text"></i>
                            <input
                                class="bg-gray-100 w-full rounded border-0 py-1.5 px-3 pl-10 text-gray-900 ring-1 ring-gray-300 focus:ring-gray-300 placeholder:text-gray-400 tablet:text-sm tablet:leading-6"
                                type="text" readonly name="program" id="disable" value="{{ $student->program->name }}">
                        </div>
                    </div>
                    <div class="my-2 tablet:my-0 flex items-center">
                        <label class="text-lg font-semibold mr-3">Semestre:</label>
                        <div class="relative flex-1">
                            <i class="text-gray-400 text-xl absolute top-1/2 -translate-y-1/2 py-1 px-2 bi bi-hash"></i>
                            <input
                                class="bg-gray-100 w-full rounded border-0 py-1.5 px-3 pl-10 text-gray-900 ring-1 ring-gray-300 focus:ring-gray-300 placeholder:text-gray-400 tablet:text-sm tablet:leading-6"
                                readonly type="number" max="9" min="1" class="camponumero" id="disable"
                                name="semester" value="{{ $student->semester }}">
                        </div>
                    </div>
                    <div class="my-2 tablet:my-0 col-span-4 Field-container">
                        <label class="text-lg font-semibold">Descripción:</label>
                        <i class="text-gray-400 text-xl py-1 px-2 bi bi-card-text"></i>
                        <textarea
                            class="w-full rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                            cols="30" rows="6" name="description">{{ old('description') }}</textarea>
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
                <div class="flex items-center">
                    <input type="hidden" name="team_id" value="{{ $student->teams[0]->id }}">
                    <input type="hidden" name="activity_id" value="{{ $activityId }}">
                    <input type="hidden" value="{{ $activity->type_id }}" name="type_activity_id">
                    <button type="submit" name="send" class="button txt-white bg-primary-100 center">Enviar</button>
                </div>
            </article>
        </form>
    </section>

@endsection

@push('styles')
    @vite('resources/css/form.proposal.css')
@endpush
@push('scripts')
    @vite('resources/js/form.proposal.js')
@endpush
