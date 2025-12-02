@extends('layout.app')

@section('contenido')

<section class="ftco-section d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 p-3 py-5">
        <div class="bg-light p-4 rounded shadow">
          <h2 class="mb-4 text-center text-dark">Editar País</h2>

          <form action="{{ route('paises.update', $pais->id) }}" id="FormPaisEdit" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-12">
                <label><b>Nombre del país:</b></label>
                <input type="text" name="pais" class="form-control rounded" value="{{ $pais->pais }}" required>
              </div>

              <div class="col-md-12 text-center mt-4">
                <a href="{{ route('paises.index') }}" class="btn btn-outline-danger me-3 rounded">
                  <i class="fa fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-outline-primary rounded">
                  <i class="fa fa-save"></i> Actualizar País
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

  $("#FormPaisEdit").validate({
    rules: {
      pais: { required: true, minlength: 2, maxlength: 100 }
    },
    messages: {
      pais: {
        required: "Ingrese el nombre del país",
        minlength: "Debe tener al menos 2 caracteres",
        maxlength: "Máximo 100 caracteres"
      }
    }
  });
});
</script>

@endsection
