<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Clase;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::with('clase')->get();
        return view('asistencias.index', compact('asistencias'));
    }

    public function create()
    {
        $clases = Clase::all();
        return view('asistencias.create', compact('clases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clase_id' => 'required|exists:clase,id',
            'nombre_estudiante' => 'required|string|max:255',
            'estado' => 'required|in:presente,ausente,tardanza',
            'fecha' => 'required|date',
        ]);

        Asistencia::create($request->all());

        return redirect()->route('asistencias.index')->with('success', 'Asistencia registrada correctamente.');
    }

    public function show(Asistencia $asistencia)
    {
        return view('asistencias.show', compact('asistencia'));
    }

    public function edit(Asistencia $asistencia)
    {
        $clases = Clase::all();
        return view('asistencias.edit', compact('asistencia', 'clases'));
    }

    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'clase_id' => 'required|exists:clase,id',
            'nombre_estudiante' => 'required|string|max:255',
            'estado' => 'required|in:presente,ausente,tardanza',
            'fecha' => 'required|date',
        ]);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();
        return redirect()->route('asistencias.index')->with('success', 'Registro de asistencia eliminado.');
    }
}