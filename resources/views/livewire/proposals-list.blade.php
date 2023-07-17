<div>
    @foreach ($activity->proposals as $proposal)
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
                    <td>{{ $proposal->id }}</td>
                    <td>{{ $proposal->title }}</td>
                    <td>{{ $proposal->program }}</td>
                    <td>{{ $proposal->semester }}</td>
                    <td>{{ $proposal->created_at }}</td>
                    <td>{{ $proposal->status }}</td>
                    <td>
                        <button class="Preview-button" title="Ver" type="button" wire:click="$emit('openModal')">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </td>
                    @livewire('proposal-modal', ['proposal' => $proposal])
                </tr>
            </tbody>
        </table>
    @endforeach
</div>
