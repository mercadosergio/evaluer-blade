<div>
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
</div>