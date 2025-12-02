<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::orderBy('pais', 'asc')->get();
        return view('paises.index', compact('paises'));
    }

    public function create()
    {
        return view('paises.nuevopais');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pais' => 'required|string|min:2|max:100|unique:paises,pais',
        ], [
            'pais.required' => 'Ingrese el nombre del país',
            'pais.min' => 'El nombre es muy corto',
            'pais.max' => 'Máximo 100 caracteres',
            'pais.unique' => 'Este país ya existe'
        ]);

        Pais::create([
            'pais' => $request->pais,
        ]);

        return redirect()->route('paises.index')->with('success', 'País registrado correctamente.');
    }

    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        return view('paises.editarpais', compact('pais'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pais' => 'required|string|min:2|max:100|unique:paises,pais,'.$id,
        ], [
            'pais.required' => 'Ingrese el nombre del país',
            'pais.min' => 'El nombre es muy corto',
            'pais.max' => 'Máximo 100 caracteres',
            'pais.unique' => 'Este país ya existe'
        ]);

        $pais = Pais::findOrFail($id);
        $pais->update($request->all());

        return redirect()->route('paises.index')->with('success', 'País actualizado correctamente.');
    }

    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);

        if ($pais->deportistas()->count() > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar el país porque está siendo utilizado por uno o más deportistas.');
        }

        $pais->delete();
        return redirect()->back()->with('success', 'País eliminado correctamente.');
    }


}
