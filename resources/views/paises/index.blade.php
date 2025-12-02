@extends('layout.app')

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4">Listado de Países</h1>

    <div class="text-end mb-3">
        <a href="{{ route('paises.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Nuevo País
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle" id="tablePaises">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paises as $pais)
                <tr>
                    <td>{{ $pais->id }}</td>
                    <td>{{ $pais->pais }}</td>
                    <td class="text-center">

                        <a href="{{ route('paises.edit', $pais->id) }}"
                           class="btn btn-outline-warning btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>

                        <form action="{{ route('paises.destroy', $pais->id) }}"
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

{{-- SCRIPTS CORRECTOS --}}
<script>
document.addEventListener("DOMContentLoaded", function() {

    // Inicializar DataTables correctamente
    new DataTable('#tablePaises', {
        language: { url: 'https://cdn.datatables.net/plug-ins/2.3.1/i18n/es-ES.json' },
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    // Confirmación de SweetAlert PARA TODAS LAS ELIMINACIONES
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
