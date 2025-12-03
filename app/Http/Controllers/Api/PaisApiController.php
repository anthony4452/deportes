<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\Request;


class PaisApiController extends Controller
{
    public function index()
    {
        return response()->json(Pais::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pais' => 'required|string|min:2|max:100|unique:paises,pais',
        ]);

        $pais = Pais::create([
            'pais' => $request->pais
        ]);

        return response()->json($pais, 201);
    }

    public function show($id)
    {
        $pais = Pais::find($id);

        if (!$pais) {
            return response()->json(['error' => 'País no encontrado'], 404);
        }

        return response()->json($pais, 200);
    }

    public function update(Request $request, $id)
    {
        $pais = Pais::find($id);

        if (!$pais) {
            return response()->json(['error' => 'País no encontrado'], 404);
        }

        $request->validate([
            'pais' => 'required|string|min:2|max:100|unique:paises,pais,' . $id,
        ]);

        $pais->update([
            'pais' => $request->pais
        ]);

        return response()->json($pais, 200);
    }

    public function destroy($id)
    {
        $pais = Pais::find($id);

        if (!$pais) {
            return response()->json(['error' => 'País no encontrado'], 404);
        }

        if ($pais->deportistas()->count() > 0) {
            return response()->json(['error' => 'No se puede eliminar, está en uso.'], 400);
        }

        $pais->delete();

        return response()->json(['mensaje' => 'País eliminado'], 200);
    }
}
