<?php

namespace App\Http\Controllers;

class AmbienteController extends Controller
{
    public function show($aula) { return "Parámetros actuales del aula ID: $aula (por hacer)"; }
    public function historial($aula) { return "Historial de sensores del aula ID: $aula (por hacer)"; }
}