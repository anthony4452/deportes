@extends('layout.app')


@section('contenido')

<section class="ftco-section d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 p-3 py-5">
        <div class="bg-light p-4 rounded shadow">
          <h2 class="mb-4 text-center text-dark">Editar Disciplina</h2>

          <form action="{{ route('disciplinas.update', $disciplina->id) }}" id="FormDisciplinaEdit" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-12">
                <label><b>Nombre de la disciplina:</b></label>
                <input type="text" name="disciplina" class="form-control rounded" value="{{ $disciplina->disciplina }}" required>
              </div>

              <div class="col-md-12 text-center mt-4">
                <a href="{{ route('disciplinas.index') }}" class="btn btn-outline-danger me-3 rounded">
                  <i class="fa fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-outline-primary rounded">
                  <i class="fa fa-save"></i> Actualizar Disciplina
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function () {
  $.validator.setDefaults({ ignore: [] });

  $("#FormDisciplinaEdit").validate({
    rules: {
      disciplina: { required: true, minlength: 2, maxlength: 100 }
    },
    messages: {
      disciplina: {
        required: "Ingrese la disciplina",
        minlength: "Debe tener al menos 2 caracteres",
        maxlength: "Máximo 100 caracteres"
      }
    }
  });
});
</script>

@endsection
