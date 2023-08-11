@extends('layout.admin')
@section('title', 'Dashboard')

@section('content')
    <section class="px-4">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Dashboard</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div>
            <div class="Stats">
                <div
                    class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl">{{ $students->count() }}</p>
                        <p>Estudiantes</p>
                    </div>
                </div>
                <div
                    class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl">{{ $advisors->count() }}</p>
                        <p>Asesores/Docentes</p>
                    </div>
                </div>
                <div
                    class="bg-blue-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 text-white font-medium group">
                    <div
                        class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="stroke-current text-blue-800 transform transition-transform duration-500 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl">{{ $coordinators->count() }}</p>
                        <p>Coordinadores de programa</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col tablet:grid tablet:grid-cols-2 laptop:grid-cols-3 tablet:gap-6">
                <a href="{{ route('register') }}" class="custom-shadow">
                    <div class="flex flex-col rounded-md bg-white">
                        <h2 class="Modules-h2">Registro de usuario</h2>
                        <img class="Modules-img" src="{{ asset('img/add-user.png') }}" alt="">
                    </div>
                </a>
                <a href="{{ route('show.users') }}" class="custom-shadow">
                    <div class="flex flex-col rounded-md bg-white">
                        <h2 class="Modules-h2">Usuarios</h2>
                        <img class="Modules-img" src="{{ asset('img/control-user.png') }}" alt="">
                    </div>
                </a>
                <a href="" class="custom-shadow">
                    <div class="flex flex-col rounded-md bg-white">
                        <h2 class="Modules-h2">Notas</h2>
                        <img class="Modules-img" src="{{ asset('img/notas.png') }}" alt="">
                    </div>
                </a>
                <a href="{{ route('show.programs') }}" class="custom-shadow">
                    <div class="flex flex-col rounded-md bg-white">
                        <h2 class="Modules-h2">Programas</h2>
                        <img class="Modules-img" src="{{ asset('img/programas.png') }}" alt="">
                    </div>
                </a>
                <a href="" class="custom-shadow">
                    <div class="flex flex-col rounded-md bg-white">
                        <h2 class="Modules-h2">Peticiones</h2>
                        <img class="Modules-img" src="{{ asset('img/request.png') }}" alt="">
                    </div>
                </a>
                <a href="/roles" class="custom-shadow">
                    <div class="flex flex-col rounded-md bg-white">
                        <h2 class="Modules-h2">Roles</h2>
                        <img class="Modules-img" src="{{ asset('img/request.png') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/admin.dashboard.css')
@endpush
