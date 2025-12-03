@extends('layout.app')

@section('contenido')
<section class="ftco-section d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-3 py-5">
        <div class="bg-light p-4 rounded shadow">
          <h2 class="mb-4 text-center text-dark">Registrar Nuevo Deportista</h2>

          <form action="{{ route('deportistas.store') }}" id="FormDeportistaCreate" class="validate-form" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nombre" class="form-label"><b>Nombre completo:</b></label>
              <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" class="form-control rounded @error('nombre') is-invalid @enderror" required>
              @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label"><b>Apellido completo:</b></label>
              <input id="apellido" type="text" name="apellido" value="{{ old('apellido') }}" class="form-control rounded @error('apellido') is-invalid @enderror" required>
              @error('apellido')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="fecha_nacimiento" class="form-label"><b>Fecha de Nacimiento:</b></label>
              <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control rounded @error('fecha_nacimiento') is-invalid @enderror" required>
              @error('fecha_nacimiento')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="estatura" class="form-label"><b>Estatura (m):</b></label>
              <input id="estatura" type="number" step="0.01" name="estatura" value="{{ old('estatura') }}" class="form-control rounded @error('estatura') is-invalid @enderror" required>
              @error('estatura')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="peso" class="form-label"><b>Peso (kg):</b></label>
              <input id="peso" type="number" step="0.01" name="peso" value="{{ old('peso') }}" class="form-control rounded @error('peso') is-invalid @enderror" required>
              @error('peso')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="pais_id" class="form-label"><b>País:</b></label>
              <select id="pais_id" name="pais_id" class="form-select rounded @error('pais_id') is-invalid @enderror" required>
                <option value="">Seleccione un país</option>
                @foreach($paises as $pais)
                  <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>{{ $pais->pais }}</option>
                @endforeach
              </select>
              @error('pais_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="disciplina_id" class="form-label"><b>Disciplina:</b></label>
              <select id="disciplina_id" name="disciplina_id" class="form-select rounded @error('disciplina_id') is-invalid @enderror" required>
                <option value="">Seleccione una disciplina</option>
                @foreach($disciplinas as $disc)
                  <option value="{{ $disc->id }}" {{ old('disciplina_id') == $disc->id ? 'selected' : '' }}>
                    {{ $disc->disciplina }}
                  </option>
                @endforeach
              </select>
              @error('disciplina_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
              <a href="{{ route('deportistas.index') }}" class="btn btn-outline-danger rounded">
                <i class="fa fa-times"></i> Cancelar
              </a>
              <button type="submit" class="btn btn-outline-primary rounded">
                <i class="fa fa-save"></i> Registrar Deportista
              </button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
$(document).ready(function () {

  $.validator.addMethod("noFuturo", function (value, element) {
    if (!value) return false;
    const fecha = new Date(value);
    const hoy = new Date();
    fecha.setHours(0,0,0,0);
    hoy.setHours(0,0,0,0);
    return fecha <= hoy;
  }, "La fecha no puede ser futura.");

  $.validator.setDefaults({ ignore: [] });

  // VALIDACIÓN FORMULARIO CREAR
  $("#FormDeportistaCreate").validate({
    rules: {
      nombre: { required: true, minlength: 2, maxlength: 255 },
      apellido: { required: true, minlength: 2, maxlength: 255 },
      fecha_nacimiento: { required: true, date: true, noFuturo: true },
      estatura: { required: true, number: true },
      peso: { required: true, number: true },
      pais_id: { required: true },
      disciplina_id: { required: true }
    },
    messages: {
      nombre: {
        required: "Ingrese el nombre",
        minlength: "Debe tener al menos 2 caracteres",
        maxlength: "Máximo 255 caracteres"
      },
      apellido: {
        required: "Ingrese el apellido",
        minlength: "Debe tener al menos 2 caracteres",
        maxlength: "Máximo 255 caracteres"
      },
      fecha_nacimiento: {
        required: "Ingrese la fecha",
        date: "Ingrese una fecha válida",
        noFuturo: "La fecha no puede ser futura"
      },
      estatura: {
        required: "Ingrese la estatura",
        number: "Ingrese un valor válido"
      },
      peso: {
        required: "Ingrese el peso",
        number: "Ingrese un valor válido"
      },
      pais_id: { required: "Seleccione un país" },
      disciplina_id: { required: "Seleccione una disciplina" }
    }
  });

});
</script>
@endpush

@endsection
