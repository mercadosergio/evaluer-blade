@extends('layout.app')

@section('content')
    <form action="{{ route('users.register') }}" method="POST" id="">
        @csrf
        <section class="Register">
            <div class="Register-title">
                <i class="Register-i bi bi-person-add"></i>
                <h1 class="Register-h1" id="title-h1">Información del usuario</h1>
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
            <div class="Register-div">
                <label for="dni" class="Register-label">Rol de usuario</label>
                <select name="role_id" id="role">
                    <option value="none">Seleccione...</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="Register-div">
                <label for="dni" class="Register-label">Documento de identidad:</label>
                <input type="text" class="Register-input" name="dni">
            </div>
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="Register-div">
                <label for="name" class="Register-label">Nombres:</label>
                <input type="text" class="Register-input" name="name">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="Register-div">
                <label for="lastname1" class="Register-label">Primer apellido:</label>
                <input type="text" class="Register-input" name="first_lastname">
            </div>
            @error('first_lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="Register-div">
                <label for="lastname2" class="Register-label">Segundo apellido:</label>
                <input type="text" class="Register-input" name="second_lastname">
            </div>
            @error('second_lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="Register-div">
                <label for="program" class="Register-label">Programa académico:
                </label>
                <select name='program' id="programSelect">
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
            <div class="Register-div" id="semester-field">
                <label for="semester" class="Register-label">Semestre:</label>
                <div id="selectSemester" class="Semester-buttongroup">

                </div>
            </div>
            <div class="Register-div">
                <label for="email" class="Register-label">Email:</label>
                <input type="text" class="Register-input" name="email">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="Register-div">
                <label for="phone_number" class="Register-label">Telefono:</label>
                <input type="text" class="Register-input" name="phone">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="Register-button button txt-white back-primary" type="submit"
                title="Registrar">Registrar</button>
        </section>
    </form>
@endsection

@push('styles')
    @vite('resources/css/create.user.css')
@endpush

@push('scripts')
    @vite('resources/js/create.user.js')
@endpush
