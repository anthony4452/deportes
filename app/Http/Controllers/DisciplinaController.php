<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::orderBy('disciplina', 'asc')->get();
        return view('disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        return view('disciplinas.nuevadisciplina');
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina' => 'required|string|min:2|max:100|unique:disciplinas,disciplina',
        ], [
            'disciplina.required' => 'Ingrese la disciplina',
            'disciplina.min' => 'La disciplina es muy corta',
            'disciplina.max' => 'Máximo 100 caracteres',
            'disciplina.unique' => 'Esta disciplina ya existe'
        ]);

        Disciplina::create([
            'disciplina' => $request->disciplina,
        ]);

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina registrada correctamente.');
    }

    public function edit($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        return view('disciplinas.editardisciplina', compact('disciplina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'disciplina' => 'required|string|min:2|max:100|unique:disciplinas,disciplina,'.$id,
        ], [
            'disciplina.required' => 'Ingrese la disciplina',
            'disciplina.min' => 'La disciplina es muy corta',
            'disciplina.max' => 'Máximo 100 caracteres',
            'disciplina.unique' => 'Esta disciplina ya existe'
        ]);

        $disciplina = Disciplina::findOrFail($id);
        $disciplina->update($request->all());

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina actualizada correctamente.');
    }

    public function destroy($id)
    {
        $disciplina = Disciplina::findOrFail($id);

        if ($disciplina->deportistas()->count() > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar la disciplina porque está siendo utilizada por uno o más deportistas.');
        }

        $disciplina->delete();
        return redirect()->back()->with('success', 'Disciplina eliminada correctamente.');
    }


}
