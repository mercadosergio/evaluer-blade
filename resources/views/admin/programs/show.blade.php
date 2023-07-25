@extends('layout.app')

@section('title', 'Programas académicos')

@section('content')
    <section class="Indice">
        <h1>Programas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Programas</li>
            </ol>
        </nav>
    </section>
    <section class="Roles Container-section">
        <div class="Title">
            <i class="Title-i bi bi-list-ul"></i>
            <h1 class="Title-h1">Lista de programas</h1>
        </div>
        <table class="Table table" id="tableRoles">
            <thead class="Table-thead">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Código SNIES</th>
                    <th>Duración(semestres)</th>
                    <th>Modalidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="Table-tbody">
                @foreach ($programs as $program)
                    <tr>
                        <td>{{ $program->id }}</td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->snies_code }}</td>
                        <td>{{ $program->duration }}</td>
                        <td>{{ $program->mode }}</td>
                        <td><span
                                class="badge text-bg-{{ $program->status == 1 ? 'success' : 'danger' }}">{{ $program->status == 1 ? 'Activo' : 'Inactivo' }}</span>
                        </td>
                        <td>
                            <button type='button' title='Editar' data-idrol="{{ $program->id }}"
                                data-namerol="{{ $program->name }}" data-statusrol="{{ $program->status }}"
                                class='Edit-button'><i class='bi bi-pencil-fill' data-bs-toggle="modal"
                                    data-bs-target="#editModal"></i></button>
                            <button type='button' title='Eliminar' data-idrol="{{ $program->id }}"
                                data-namerol="{{ $program->name }}" data-bs-toggle='modal' data-bs-target='#staticBackdrop'
                                onclick="openDel(this)" class='Delete-button'><i class='bi bi-trash-fill'></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

@push('styles')
    @vite('resources/css/show.programs.css')
@endpush
