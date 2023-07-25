@extends('layout.app')
@section('title', 'Usuarios')

@section('content')
    <section class="Indice">
        <h1>Usuarios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </nav>
    </section>

    <section class="Table-section">
        <div class="Tabs-container">
            <ul class="TabsMenu">
                <li class="TabsMenu-li active bg-success">
                    <a class="TabsMenu-a" href="">Estudiantes</a>
                </li>
                <li class="TabsMenu-li bg-warning">
                    <a class="TabsMenu-a" href="">Asesores</a>
                </li>
                <li class="TabsMenu-li bg-danger">
                    <a class="TabsMenu-a" href="">Coordinadores</a>
                </li>
            </ul>
            <div class="TabsBody">
                <div class="TabsPanel active" data-index="0">
                    <table class=" table" id="tableUsers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Documento de identidad</th>
                                <th>Nombres</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                @if ($student->user->role_id === 1)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>
                                            <img src="{{ asset('avatar/' . $student->user->avatar) }}" width="60"
                                                height="60"
                                                alt="{{ $student->names }} {{ $student->first_lastname }} {{ $student->second_lastname }}">
                                        </td>
                                        <td>{{ $student->dni }}</td>
                                        <td>{{ $student->names }}</td>
                                        <td>{{ $student->first_lastname }}</td>
                                        <td>{{ $student->second_lastname }}</td>
                                        <td>
                                            <span
                                                class="badge text-bg-{{ $student->user->status == 1 ? 'success' : 'danger' }}">{{ $student->user->status == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td>
                                            <button type='button' title='Editar' class='Edit-button' data-bs-toggle="modal"
                                                data-bs-target="#editModal"><i class='bi bi-pencil-fill'></i></button>
                                            <button type='button' title='Eliminar' class='Delete-button'
                                                data-bs-toggle='modal' data-bs-target='#staticBackdrop'><i
                                                    class='bi bi-trash-fill'></i></button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="TabsPanel" data-index="1">
                    <table class=" table" id="tableUsers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Documento de identidad</th>
                                <th>Nombres</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advisors as $advisor)
                                @if ($advisor->user->role_id === 2)
                                    <tr>
                                        <td><?= $advisor->id ?></td>
                                        <td>
                                            <img src="{{ asset('avatar/' . $advisor->user->avatar) }}" width="60"
                                                height="60"
                                                alt="{{ $advisor->names }} {{ $advisor->first_lastname }} {{ $advisor->second_lastname }}">
                                        </td>
                                        <td>{{ $advisor->dni }}</td>
                                        <td>{{ $advisor->names }}</td>
                                        <td>{{ $advisor->first_lastname }}</td>
                                        <td>{{ $advisor->second_lastname }}</td>
                                        <td><span
                                                class="badge text-bg-{{ $advisor->user->status == 1 ? 'success' : 'danger' }}">{{ $advisor->user->status == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td>
                                            <button type='button' title='Editar' class='Edit-button'><i
                                                    class='bi bi-pencil-fill'></i></button>
                                            <button type='button' title='Eliminar' class='Delete-button'
                                                data-bs-toggle='modal' data-bs-target='#staticBackdrop'><i
                                                    class='bi bi-trash-fill'></i></button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="TabsPanel" data-index="2">
                    <table class=" table" id="tableUsers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Documento de identidad</th>
                                <th>Nombres</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coordinators as $coordinator)
                                @if ($coordinator->user->role_id === 3)
                                    <tr>
                                        <td><?= $coordinator->id ?></td>
                                        <td>
                                            <img src="{{ asset('avatar/' . $coordinator->user->avatar) }}" width="60"
                                                height="60"
                                                alt="{{ $coordinator->names }} {{ $coordinator->first_lastname }} {{ $coordinator->second_lastname }}">
                                        </td>
                                        <td>{{ $coordinator->advisor->dni }}</td>
                                        <td>{{ $coordinator->advisor->names }}</td>
                                        <td>{{ $coordinator->advisor->first_lastname }}</td>
                                        <td>{{ $coordinator->advisor->second_lastname }}</td>
                                        <td>
                                            <span
                                                class="badge text-bg-{{ $coordinator->user->status == 1 ? 'success' : 'danger' }}">{{ $coordinator->user->status == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td>
                                            <button type='button' title='Editar' class='Edit-button' id="edit-modal"><i
                                                    class='bi bi-pencil-fill'></i></button>
                                            <button type='button' title='Eliminar' class='Delete-button'
                                                data-bs-toggle='modal' data-bs-target='#staticBackdrop'><i
                                                    class='bi bi-trash-fill'></i></button>
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
