@extends('layout.admin')
@section('title', 'Registrar usuario')

@section('content')
    <form action="{{ route('users.register') }}" method="POST" id="">
        @csrf
        <section class="w-9/12 m-auto flex flex-col rounded-sm bg-white py-6 px-12 custom-shadow">
            <div class="Title">
                <i class="bi bi-person-add"></i>
                <h1 class="Title-h1" id="title-h1">Información del usuario</h1>
            </div>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="flex my-4 justify-between">
                <label for="role" class="font-semibold">Rol de usuario</label>
                <select name="role_id" id="role"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6">
                    <option value="none">Seleccione...</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex my-4 justify-between">
                <label for="dni" class="font-semibold">Documento de identidad:</label>
                <input type="text"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                    name="dni">
            </div>
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="flex my-4 justify-between">
                <label for="name" class="font-semibold">Nombres:</label>
                <input type="text"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                    name="name">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="flex my-4 justify-between">
                <label for="lastname1" class="font-semibold">Primer apellido:</label>
                <input type="text"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                    name="first_lastname">
            </div>
            @error('first_lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="flex my-4 justify-between">
                <label for="lastname2" class="font-semibold">Segundo apellido:</label>
                <input type="text"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                    name="second_lastname">
            </div>
            @error('second_lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="flex my-4 justify-between">
                <label for="program" class="font-semibold">Programa académico:
                </label>
                <select name='program' id="programSelect"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6">
                    <option value="none" selected>Seleccione...</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">
                            {{ $program->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('program')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="flex my-4" id="semester-field justify-between">
                <label for="semester" class="font-semibold">Semestre:</label>
                <div id="selectSemester" class="Semester-buttongroup">

                </div>
            </div>
            <div class="flex my-4 justify-between">
                <label for="email" class="font-semibold">Email:</label>
                <input type="text"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                    name="email">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="flex my-4 justify-between">
                <label for="phone_number" class="font-semibold">Telefono:</label>
                <input type="text"
                    class="w-2/3 rounded border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-100 tablet:text-sm tablet:leading-6"
                    name="phone">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="m-auto button text-white bg-primary-100" type="submit" title="Registrar">Registrar</button>
        </section>
    </form>
@endsection

@push('styles')
    @vite('resources/css/create.user.css')
@endpush

@push('scripts')
    @vite('resources/js/create.user.js')
@endpush
