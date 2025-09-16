<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function chartAsistencia()
{
    return view('charts.asistencia');
}
public function chartPokemon()
{
    return view('charts.pokemon');
}
}