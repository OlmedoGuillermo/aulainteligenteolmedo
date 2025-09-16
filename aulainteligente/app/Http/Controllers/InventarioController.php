<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Aula;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    // Mostrar inventario de un aula
    public function show(Aula $aula)
    {
        $inventarios = Inventario::where('aula_id', $aula->id)->get();
        return view('inventario.show', compact('aula', 'inventarios'));
    }

    // Crear nuevo ítem de inventario
    public function store(Request $request)
    {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo' => 'required|in:silla,mesa,pizarrón,proyector',
            'cantidad' => 'required|integer|min:1',
        ]);

        Inventario::create($request->all());

        return back()->with('success', 'Ítem agregado al inventario.');
    }

    // Editar ítem
    public function edit(Inventario $inventario)
    {
        $aulas = Aula::all();
        return view('inventario.edit', compact('inventario', 'aulas'));
    }

    // Actualizar ítem
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo' => 'required|in:silla,mesa,pizarrón,proyector',
            'cantidad' => 'required|integer|min:1',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventario.show', $inventario->aula_id)->with('success', 'Ítem actualizado.');
    }

    // Eliminar ítem
    public function destroy(Inventario $inventario)
    {
        $aula_id = $inventario->aula_id;
        $inventario->delete();
        return redirect()->route('inventario.show', $aula_id)->with('success', 'Ítem eliminado.');
    }
}