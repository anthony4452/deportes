@extends('layout.app')

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4">Listado de Deportistas</h1>

    <div class="text-end mb-3">
        <a href="{{ route('deportistas.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Nuevo Deportista
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle" id="tableDeportistas">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Estatura</th>
                    <th>Peso</th>
                    <th>País</th>
                    <th>Disciplina</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($deportistas as $dep)
                <tr>
                    <td>{{ $dep->id }}</td>
                    <td>{{ $dep->nombre }}</td>
                    <td>{{ $dep->fecha_nacimiento }}</td>
                    <td>{{ $dep->estatura }}</td>
                    <td>{{ $dep->peso }}</td>
                    <td>{{ $dep->pais->pais }}</td>
                    <td>{{ $dep->disciplina->disciplina }}</td>

                    <td class="text-center">

                        <a href="{{ route('deportistas.edit', $dep->id) }}"
                           class="btn btn-outline-warning btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>

                        <form action="{{ route('deportistas.destroy', $dep->id) }}"
                              method="POST"
                              class="d-inline form-eliminar">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger btn-sm btn-eliminar">
                                <i class="fa fa-trash"></i>
                            </button>

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    new DataTable('#tableDeportistas', {
        language: { url: 'https://cdn.datatables.net/plug-ins/2.3.1/i18n/es-ES.json' },
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    document.querySelectorAll('.form-eliminar').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Seguro que deseas eliminar?',
                text: 'No podrás revertir esta acción.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
</script>
@endsection
