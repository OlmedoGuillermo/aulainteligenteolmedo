<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Aula;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function index()
    {
        $clases = Clase::with('aula')->get();
        return view('clases.index', compact('clases'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('clases.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materia' => 'required|in:Matemáticas,Física,Programación,Historia,Química',
            'profesor' => 'required|string|max:255',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes',
            'modulo' => 'required|in:07:00 - 08:30,08:40 - 10:10,10:30 - 12:00,13:00 - 14:30,14:40 - 16:10',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        Clase::create($request->all());

        return redirect()->route('clases.index')->with('success', 'Clase creada correctamente.');
    }

    public function show(Clase $clase)
    {
        return view('clases.show', compact('clase'));
    }

    public function edit(Clase $clase)
    {
        $aulas = Aula::all();
        return view('clases.edit', compact('clase', 'aulas'));
    }

    public function update(Request $request, Clase $clase)
    {
        $request->validate([
            'materia' => 'required|in:Matemáticas,Física,Programación,Historia,Química',
            'profesor' => 'required|string|max:255',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes',
            'modulo' => 'required|in:07:00 - 08:30,08:40 - 10:10,10:30 - 12:00,13:00 - 14:30,14:40 - 16:10',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $clase->update($request->all());

        return redirect()->route('clases.index')->with('success', 'Clase actualizada correctamente.');
    }

    public function destroy(Clase $clase)
    {
        $clase->delete();
        return redirect()->route('clases.index')->with('success', 'Clase eliminada correctamente.');
    }
}