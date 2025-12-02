@extends('layout.app')

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4">Listado de Disciplinas</h1>

    <div class="text-end mb-3">
        <a href="{{ route('disciplinas.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Nueva Disciplina
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle" id="tableDisciplinas">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Disciplina</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $dis)
                <tr>
                    <td>{{ $dis->id }}</td>
                    <td>{{ $dis->disciplina }}</td>
                    <td class="text-center">

                        <a href="{{ route('disciplinas.edit', $dis->id) }}"
                           class="btn btn-outline-warning btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>

                        <form action="{{ route('disciplinas.destroy', $dis->id) }}"
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

    new DataTable('#tableDisciplinas', {
        language: { url: 'https://cdn.datatables.net/plug-ins/2.3.1/i18n/es-ES.json' },
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    document.querySelectorAll('.form-eliminar').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Seguro que deseas eliminar?',
                text: 'Esta acción no se puede deshacer.',
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
