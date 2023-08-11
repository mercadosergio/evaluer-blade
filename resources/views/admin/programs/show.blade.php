@extends('layout.admin')

@section('title', 'Programas académicos')

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
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Programas académicos</span>
            </div>
        </li>
    </ol>
</nav>
    <div class="Roles Container-section">
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
    </div>
@endsection

@push('styles')
    @vite('resources/css/show.programs.css')
@endpush
