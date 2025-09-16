<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Aula;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index()
    {
        $dispositivos = Dispositivo::with('aula')->get();
        return view('dispositivos.index', compact('dispositivos'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('dispositivos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:foco,aire,proyector,persiana',
            'estado' => 'required|in:Encendido,Apagado,En mantenimiento',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        Dispositivo::create($request->all());

        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo creado correctamente.');
    }

    public function show(Dispositivo $dispositivo)
    {
        return view('dispositivos.show', compact('dispositivo'));
    }

    public function edit(Dispositivo $dispositivo)
    {
        $aulas = Aula::all();
        return view('dispositivos.edit', compact('dispositivo', 'aulas'));
    }

    public function update(Request $request, Dispositivo $dispositivo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:foco,aire,proyector,persiana',
            'estado' => 'required|in:Encendido,Apagado,En mantenimiento',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $dispositivo->update($request->all());

        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo actualizado correctamente.');
    }

    public function destroy(Dispositivo $dispositivo)
    {
        $dispositivo->delete();
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo eliminado correctamente.');
    }
}