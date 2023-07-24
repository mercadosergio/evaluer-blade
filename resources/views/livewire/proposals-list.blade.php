<div>
    @foreach ($activity->submissions as $submission->proposal)
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
                    <td>{{ $submission->proposal->id }}</td>
                    <td>{{ $submission->proposal->title }}</td>
                    <td>{{ $submission->proposal->program }}</td>
                    <td>{{ $submission->proposal->semester }}</td>
                    <td>{{ $submission->created_at }}</td>
                    <td>{{ $submission->progress->name }}</td>
                    <td>
                        <button class="Preview-button" title="Ver" type="button" wire:click="$emit('openModal')">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </td>
                    @livewire('proposal-modal', ['submission' => $submission])
                </tr>
            </tbody>
        </table>
    @endforeach
</div>
