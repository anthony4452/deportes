@extends('layout.app')

@section('contenido')

<section class="ftco-section d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-3 py-5">
        <div class="bg-light p-4 rounded shadow">
          <h2 class="mb-4 text-center text-dark">Registrar Nuevo Deportista</h2>

          <form action="{{ route('deportistas.store') }}" id="FormDeportista" class="validate-form" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label"><b>Nombre completo:</b></label>
              <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" class="form-control rounded @error('nombre') is-invalid @enderror" placeholder="Ej: Juan Perez" required>
              @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="fecha_nacimiento" class="form-label"><b>Fecha de Nacimiento:</b></label>
              <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control rounded @error('fecha_nacimiento') is-invalid @enderror" required>
              @error('fecha_nacimiento')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
              <div class="col-12 mb-3">
                <label for="estatura" class="form-label"><b>Estatura (m):</b></label>
                <input id="estatura" type="number" step="0.01" name="estatura" value="{{ old('estatura') }}" class="form-control rounded @error('estatura') is-invalid @enderror" placeholder="Ej: 1.75" required>
                @error('estatura')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>

            <div class="mb-3">
              <label for="peso" class="form-label"><b>Peso (kg):</b></label>
              <input id="peso" type="number" step="0.01" name="peso" value="{{ old('peso') }}" class="form-control rounded @error('peso') is-invalid @enderror" placeholder="Ej: 68.5" required>
              @error('peso')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="pais_id" class="form-label"><b>País:</b></label>
              <select id="pais_id" name="pais_id" class="form-select rounded @error('pais_id') is-invalid @enderror" required>
                <option value="" disabled {{ old('pais_id') ? '' : 'selected' }}>Seleccione un país</option>
                @foreach($paises as $pais)
                  <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>{{ $pais->pais }}</option>
                @endforeach
              </select>
              @error('pais_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="disciplina_id" class="form-label"><b>Disciplina:</b></label>
              <select id="disciplina_id" name="disciplina_id" class="form-select rounded @error('disciplina_id') is-invalid @enderror" required>
                <option value="" disabled {{ old('disciplina_id') ? '' : 'selected' }}>Seleccione una disciplina</option>
                @foreach($disciplinas as $disc)
                  <option value="{{ $disc->id }}" {{ old('disciplina_id') == $disc->id ? 'selected' : '' }}>{{ $disc->disciplina }}</option>
                @endforeach
              </select>
              @error('disciplina_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
              <a href="{{ route('deportistas.index') }}" class="btn btn-outline-danger me-3 rounded">
                <i class="fa fa-times"></i> Cancelar
              </a>
              <button type="submit" class="btn btn-outline-success rounded">
                <i class="fa fa-save"></i> Guardar Deportista
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
  // Estilo pequeño para botones (se puede mover a CSS global si se desea)
  (function(){
    const css = document.createElement('style');
    css.type = 'text/css';
    css.appendChild(document.createTextNode('.btn:hover { transform: scale(1.03); }'));
    document.head.appendChild(css);
  })();

  $(document).ready(function () {
    // Validación: fecha no futura
    $.validator.addMethod("noFuturo", function (value, element) {
      if (!value) return false;
      const fecha = new Date(value);
      const hoy = new Date();
      // comparar solo fecha (sin hora)
      fecha.setHours(0,0,0,0);
      hoy.setHours(0,0,0,0);
      return fecha <= hoy;
    }, "La fecha no puede ser futura.");

    $.validator.setDefaults({ ignore: [] });

    // Reglas específicas para este formulario
    $("#FormDeportista").validate({
      rules: {
        nombre: { required: true, minlength: 2, maxlength: 255 },
        fecha_nacimiento: { required: true, date: true, noFuturo: true },
        estatura: { required: true, number: true },
        peso: { required: true, number: true },
        pais_id: { required: true },
        disciplina_id: { required: true }
      },
      messages: {
        nombre: {
          required: "Ingrese el nombre del deportista",
          minlength: "Debe tener al menos 2 caracteres",
          maxlength: "Máximo 255 caracteres"
        },
        fecha_nacimiento: {
          required: "Ingrese la fecha de nacimiento",
          date: "Ingrese una fecha válida",
          noFuturo: "La fecha no puede ser futura"
        },
        estatura: {
          required: "Ingrese la estatura",
          number: "Ingrese un valor numérico válido"
        },
        peso: {
          required: "Ingrese el peso",
          number: "Ingrese un valor numérico válido"
        },
        pais_id: { required: "Seleccione un país" },
        disciplina_id: { required: "Seleccione una disciplina" }
      },
      errorPlacement: function(error, element) {
        // Dejar que la configuración global la maneje, pero en caso de selects usar parent
        if (element.is('select')) {
          error.insertAfter(element.next('.select2') .length ? element.next('.select2') : element);
        } else {
          error.insertAfter(element);
        }
      }
    });
  });
</script>
@endpush

@endsection
