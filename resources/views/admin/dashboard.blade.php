@extends('layout.app')

@section('content')

<section class="Indice">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</section>
<section class="General">
    <div class="Stats">
        <div class="Stats-container border1">
            <h3 class="Stats-h3 bg1">Asesores</h3>
            <div class="Stat-body">
                <div class="Card-icon">
                    <i class="Stat-i bi bi-people"></i>
                </div>
                <h6 class="Stats-h6">
                    3
                </h6>
            </div>
        </div>
        <div class="Stats-container border2">
            <h3 class="Stats-h3 bg2">Coordinadores</h3>
            <div class="Stat-body">
                <div class="Card-icon">
                    <i class="Stat-i bi bi-people"></i>
                </div>
                <h6 class="Stats-h6">
                    4
                </h6>
            </div>
        </div>
        <div class="Stats-container border3">
            <h3 class="Stats-h3 bg3">Estudiantes</h3>
            <div class="Stat-body">
                <div class="Card-icon">
                    <i class="Stat-i bi bi-people"></i>
                </div>
                <h6 class="Stats-h6">
                    5
                </h6>
            </div>
        </div>
    </div>
    <div class="Modules">
        <a href="{{ route('register')}}" class="Modules-a">
            <div class="Modules-div back-primary">
                <h2 class="Modules-h2">Registro de usuario</h2>
                <img class="Modules-img" src="{{ asset('img/add-user.png') }}" alt="">
            </div>
        </a>
        <a href="{{ route('show.users')}}" class="Modules-a">
            <div class="Modules-div back-primary">
                <h2 class="Modules-h2">Usuarios</h2>
                <img class="Modules-img" src="{{ asset('img/control-user.png') }}" alt="">
            </div>
        </a>
        <a href="" class="Modules-a">
            <div class="Modules-div back-primary">
                <h2 class="Modules-h2">Notas</h2>
                <img class="Modules-img" src="{{ asset('img/notas.png') }}" alt="">

            </div>
        </a>
        <a href="{{ ('programas')}}" class="Modules-a">
            <div class="Modules-div back-primary">
                <h2 class="Modules-h2">Programas</h2>
                <img class="Modules-img" src="{{ asset('img/programas.png') }}" alt="">
            </div>
        </a>
        <a href="" class="Modules-a">
            <div class="Modules-div back-primary">
                <h2 class="Modules-h2">Peticiones</h2>
                <img class="Modules-img" src="{{ asset('img/request.png') }}" alt="">
            </div>
        </a>
        <a href="/roles" class="Modules-a">
            <div class="Modules-div back-primary">
                <h2 class="Modules-h2">Roles</h2>
                <img class="Modules-img" src="{{ asset('img/request.png') }}" alt="">
            </div>
        </a>
    </div>
</section>

@endsection

@push('styles')
@vite('resources/css/admin.dashboard.css')
@endpush