@extends('layout.app')

@section('content')

<section class="View-section">
    <div class="Title">
        <i class="bi bi-list-check"></i>
        <h1 class="Title-h1"> {{ $activity->title }}</h1>
    </div>
    <div class="Details-container">
        <p class="Details-p">{{ $activity->description }}</p>
        <div class="Date">
            <div class="Timelapse-container">
                <label for="">Disponible desde:</label>
                <p>
                    {{ date("d/m/Y g:i a", $activity->available_from) }}
                </p>
            </div>
            <div class="Timelapse-container">
                <label for="">Disponible hasta:</label>
                <p>
                    {{ date("d/m/Y g:i a", $activity->available_until) }}
                </p>
            </div>
        </div>
    </div>
    <div class="Title">
        <i class="bi bi-list-check"></i>
        <h1 class="Title-h1">{{ $activity->title }}</h1>
    </div>
    <div class="Qualifier">
        @switch($activity->type_id)
        @case('1')
        @if ($activity->propositions && $activity->propositions->count() > 0)
        @foreach ($activity->propositions as $proposition)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Programa</th>
                    <th>Semestre</th>
                    <th>Fecha de entrega</th>
                    <th>Nota</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $proposition->id }}</td>
                    <td>{{ $proposition->title }}</td>
                    <td>{{ $proposition->program }}</td>
                    <td>{{ $proposition->semester }}</td>
                    <td>{{ $proposition->created_at }}</td>
                    <td>{{ $proposition->status }}</td>
                    <td><button class="Preview-button" title="Ver"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
            </tbody>
        </table>
        @endforeach
        @else
        <span class='center'><em>No hay entregas disponibles.</em></span>
        @endif
        @break

        @case('2')
        @if ($activity->drafts && $activity->drafts->count() > 0)
        @foreach ($activity->drafts as $draft)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Entregable</th>
                    <th>Fecha de entrega</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $draft->id }}</td>
                    <td><a href="">{{ $draft->filename }}</a></td>
                    <td>{{ $draft->created_at }}</td>
                    <td>{{ $draft->status }}</td>
                </tr>
            </tbody>
        </table>
        @endforeach
        @else
        <span class='center'><em>No hay entregas disponibles.</em></span>
        @endif
        @break

        @case('3')
        @if ($activity->drafts && $activity->drafts->count() > 0)
        @foreach ($activity->drafts as $draft)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Entregable</th>
                    <th>Fecha de entrega</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $draft->id }}</td>
                    <td><a href="">{{ $draft->filename }}</a></td>
                    <td>{{ $draft->created_at }}</td>
                    <td>{{ $draft->status }}</td>
                </tr>
            </tbody>
        </table>
        @endforeach
        @else
        <span class='center'><em>No hay entregas disponibles.</em></span>
        @endif
        @break
        @endswitch
    </div>
</section>

@endsection

@push('styles')
@vite('resources/css/advisor.activity.css')
@endpush

@push('scripts')
@vite('resources/js/advisor.activity.js')
@endpush