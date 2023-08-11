@extends('layout.admin')
@section('title', 'Usuarios')

@section('content')
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-100">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Usuarios</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Lista</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="Table-section">
        <div class="Tabs-container w-full py-6">
            <ul class="TabsMenu flex m-0 p-0 z-50">
                <li class="TabsMenu-li rounded-tl-md rounded-tr-md active bg-success custom-shadow font-medium mr-1.5">
                    <a class="TabsMenu-a text-black block relative top-1 py-2.5 px-6 bg-white opacity-70 transition-all duration-100 ease-in-out"
                        href="">Estudiantes</a>
                </li>
                <li class="TabsMenu-li rounded-tl-md rounded-tr-md bg-warning custom-shadow font-medium mr-1.5">
                    <a class="TabsMenu-a text-black block relative top-1 py-2.5 px-6 bg-white opacity-70 transition-all duration-100 ease-in-out"
                        href="">Asesores</a>
                </li>
                <li class="TabsMenu-li rounded-tl-md rounded-tr-md bg-danger custom-shadow font-medium">
                    <a class="TabsMenu-a text-black block relative top-1 py-2.5 px-6 bg-white opacity-70 transition-all duration-100 ease-in-out"
                        href="">Coordinadores</a>
                </li>
            </ul>
            <div class="TabsBody relative p-6 rounded-r-[4px] rounded-bl-[4px] h-full overflow-auto custom-shadow bg-white">
                <div class="TabsPanel overflow-auto active" data-index="0">
                    <table class="text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Avatar</th>
                                <th scope="col" class="px-6 py-3">Documento de identidad</th>
                                <th scope="col" class="px-6 py-3">Nombres</th>
                                <th scope="col" class="px-6 py-3">Primer apellido</th>
                                <th scope="col" class="px-6 py-3">Segundo apellido</th>
                                <th scope="col" class="px-6 py-3">Creado</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                @if ($student->user->role_id === 1)
                                    <tr class="bg-white border-b border-b-gray-400">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->id }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <img class="rounded-full w-12 h-12"
                                                src="{{ filter_var($student->user->profile_photo_path, FILTER_VALIDATE_URL) ? $student->user->profile_photo_path : asset('avatar/' . $student->user->profile_photo_path) }}"
                                                alt="{{ $student->names }} {{ $student->first_lastname }} {{ $student->second_lastname }}">
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->dni }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->names }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->first_lastname }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->second_lastname }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->user->created_at->isoFormat('DD MMM YYYY') }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <span
                                                class="{{ $student->user->status == 1 ? 'bg-green-600' : 'bg-red-600' }} text-white text-xs font-medium mr-2 
                                                px-2.5 py-0.5 rounded-full">
                                                {{ $student->user->status == 1 ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                @livewire('user-form-modal', ['profile' => $student])
                                                <x-danger-button>Delete</x-danger-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="TabsPanel overflow-auto" data-index="1">
                    <table class="text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Avatar</th>
                                <th scope="col" class="px-6 py-3">Documento de identidad</th>
                                <th scope="col" class="px-6 py-3">Nombres</th>
                                <th scope="col" class="px-6 py-3">Primer apellido</th>
                                <th scope="col" class="px-6 py-3">Segundo apellido</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advisors as $advisor)
                                @if ($advisor->user->role_id === 2)
                                    <tr class="bg-white border-b border-b-gray-400">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <?= $advisor->id ?></td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <img class="rounded-full w-12 h-12""
                                                src="{{ filter_var($advisor->user->profile_photo_path, FILTER_VALIDATE_URL) ? $advisor->user->profile_photo_path : asset('avatar/' . $advisor->user->profile_photo_path) }}"
                                                alt="{{ $advisor->names }} {{ $advisor->first_lastname }} {{ $advisor->second_lastname }}">
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $advisor->dni }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $advisor->names }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $advisor->first_lastname }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $advisor->second_lastname }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <span
                                                class="{{ $advisor->user->status == 1 ? 'bg-green-600' : 'bg-red-600' }} text-white text-xs font-medium mr-2 
                                            px-2.5 py-0.5 rounded-full">
                                                {{ $advisor->user->status == 1 ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                @livewire('user-form-modal', ['profile' => $advisor])
                                                <x-danger-button>Delete</x-danger-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="TabsPanel overflow-auto" data-index="2">
                    <table class="text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Avatar</th>
                                <th scope="col" class="px-6 py-3">Documento de identidad</th>
                                <th scope="col" class="px-6 py-3">Nombres</th>
                                <th scope="col" class="px-6 py-3">Primer apellido</th>
                                <th scope="col" class="px-6 py-3">Segundo apellido</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coordinators as $coordinator)
                                @if ($coordinator->user->role_id === 3)
                                    <tr class="bg-white border-b border-b-gray-400">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <?= $coordinator->id ?></td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <img class="rounded-full w-12 h-12""
                                                src="{{ filter_var($coordinator->user->profile_photo_path, FILTER_VALIDATE_URL) ? $coordinator->user->profile_photo_path : asset('avatar/' . $coordinator->user->profile_photo_path) }}"
                                                alt="{{ $coordinator->names }} {{ $coordinator->first_lastname }} {{ $coordinator->second_lastname }}">
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $coordinator->dni }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $coordinator->names }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $coordinator->first_lastname }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $coordinator->second_lastname }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <span
                                                class="{{ $coordinator->user->status == 1 ? 'bg-green-600' : 'bg-red-600' }} text-white text-xs font-medium mr-2 
                                            px-2.5 py-0.5 rounded-full">
                                                {{ $coordinator->user->status == 1 ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                @livewire('user-form-modal', ['profile' => $coordinator])
                                                <x-danger-button>Delete</x-danger-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('register') }}" class="button-default primary-button add-btn">
                    Agregar usuarios
                </a>
            </div>
        </div>
        </section>
    @endsection

    @push('styles')
        @vite('resources/css/show.users.css')
    @endpush
    @push('scripts')
        @vite('resources/js/show.users.js')
    @endpush
