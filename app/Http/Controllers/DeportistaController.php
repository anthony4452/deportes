<?php

namespace App\Http\Controllers;

use App\Models\Deportista;
use App\Models\Pais;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeportistaController extends Controller
{
    public function index()
    {
        $deportistas = Deportista::with(['pais', 'disciplina'])->orderBy('nombre', 'asc')->get();
        return view('deportistas.index', compact('deportistas'));
    }

    public function create()
    {
        $paises = Pais::orderBy('pais', 'asc')->get();
        $disciplinas = Disciplina::orderBy('disciplina', 'asc')->get();
        return view('deportistas.nuevodeportista', compact('paises', 'disciplinas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:255',
            'apellido' => 'required|string|min:2|max:255',
            'fecha_nacimiento' => 'required|date|before_or_equal:today',
            'estatura' => 'required|numeric',
            'peso' => 'required|numeric',
            'pais_id' => 'required|exists:paises,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
        ], [
            'nombre.required' => 'Ingrese el nombre del deportista',
            'apellido.required' => 'Ingrese el nombre del deportista',
            'fecha_nacimiento.required' => 'Ingrese la fecha de nacimiento',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura',
            'estatura.required' => 'Ingrese la estatura',
            'estatura.numeric' => 'La estatura debe ser un número',
            'peso.required' => 'Ingrese el peso',
            'peso.numeric' => 'El peso debe ser un número',
            'pais_id.required' => 'Seleccione un país',
            'disciplina_id.required' => 'Seleccione una disciplina',
        ]);

        Deportista::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estatura' => (string) $request->estatura,
            'peso' => (string) $request->peso,
            'pais_id' => $request->pais_id,
            'disciplina_id' => $request->disciplina_id,
        ]);

        return redirect()->route('deportistas.index')->with('success', 'Deportista registrado correctamente.');
    }

    public function edit($id)
    {
        $deportista = Deportista::findOrFail($id);
        $paises = Pais::orderBy('pais', 'asc')->get();
        $disciplinas = Disciplina::orderBy('disciplina', 'asc')->get();
        return view('deportistas.editardeportista', compact('deportista', 'paises', 'disciplinas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:255',
            'apellido' => 'required|string|min:2|max:255',
            'fecha_nacimiento' => 'required|date|before_or_equal:today',
            'estatura' => 'required|numeric',
            'peso' => 'required|numeric',
            'pais_id' => 'required|exists:paises,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
        ], [
            'nombre.required' => 'Ingrese el nombre del deportista',
            'apellido.required' => 'Ingrese el apellido del deportista',
            'fecha_nacimiento.required' => 'Ingrese la fecha de nacimiento',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura',
            'estatura.required' => 'Ingrese la estatura',
            'estatura.numeric' => 'La estatura debe ser un número',
            'peso.required' => 'Ingrese el peso',
            'peso.numeric' => 'El peso debe ser un número',
            'pais_id.required' => 'Seleccione un país',
            'disciplina_id.required' => 'Seleccione una disciplina',
        ]);

        $deportista = Deportista::findOrFail($id);

        $deportista->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estatura' => (string) $request->estatura,
            'peso' => (string) $request->peso,
            'pais_id' => $request->pais_id,
            'disciplina_id' => $request->disciplina_id,
        ]);

        return redirect()->route('deportistas.index')->with('success', 'Deportista actualizado correctamente.');
    }

    public function destroy($id)
    {
        $deportista = Deportista::findOrFail($id);
        $deportista->delete();

        return redirect()->route('deportistas.index')->with('success', 'Deportista eliminado correctamente.');
    }
}
