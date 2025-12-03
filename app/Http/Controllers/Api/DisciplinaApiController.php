<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\Request;


class DisciplinaApiController extends Controller
{
    public function index()
    {
        return response()->json(Disciplina::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina' => 'required|string|min:2|max:100|unique:disciplinas,disciplina',
        ]);

        $disciplina = Disciplina::create([
            'disciplina' => $request->disciplina
        ]);

        return response()->json($disciplina, 201);
    }

    public function show($id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json(['error' => 'Disciplina no encontrada'], 404);
        }

        return response()->json($disciplina, 200);
    }

    public function update(Request $request, $id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json(['error' => 'Disciplina no encontrada'], 404);
        }

        $request->validate([
            'disciplina' => 'required|string|min:2|max:100|unique:disciplinas,disciplina,' . $id,
        ]);

        $disciplina->update([
            'disciplina' => $request->disciplina
        ]);

        return response()->json($disciplina, 200);
    }

    public function destroy($id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json(['error' => 'Disciplina no encontrada'], 404);
        }

        if ($disciplina->deportistas()->count() > 0) {
            return response()->json(['error' => 'No se puede eliminar, está en uso por deportistas.'], 400);
        }

        $disciplina->delete();

        return response()->json(['mensaje' => 'Disciplina eliminada'], 200);
    }
}
