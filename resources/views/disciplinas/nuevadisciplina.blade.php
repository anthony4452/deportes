@extends('layout.app')

@section('contenido')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 p-3 py-5">
        <div class="bg-light p-4 rounded shadow">
          <h2 class="mb-4 text-center text-dark">Registrar Nueva Disciplina</h2>

          <form action="{{ route('disciplinas.store') }}" id="FormDisciplina" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label><b>Nombre de la disciplina:</b></label>
                  <input type="text" name="disciplina" class="form-control rounded" placeholder="Ej: Natación" required>
                </div>
              </div>

              <div class="col-md-12 text-center mt-4">
                <a href="{{ route('disciplinas.index') }}" class="btn btn-outline-danger me-3 rounded">
                  <i class="fa fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-outline-success rounded">
                  <i class="fa fa-save"></i> Guardar Disciplina
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@push('scripts')
<script>
$(document).ready(function () {

    $.validator.setDefaults({ ignore: [] });

    $("#FormDisciplina").validate({
        rules: {
            disciplina: {
                required: true,
                minlength: 2,
                maxlength: 255
            }
        },
        messages: {
            disciplina: {
                required: "Ingrese el nombre de la disciplina",
                minlength: "Debe tener al menos 2 caracteres",
                maxlength: "Máximo 255 caracteres"
            }
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });

});
</script>
@endpush


@endsection
