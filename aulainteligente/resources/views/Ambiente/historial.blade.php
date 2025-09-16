@extends('layouts.app')

@section('title', 'Historial Ambiental - ' . $aula->nombre)

@section('content')
<div class="container mt-4">
    <h2>📜 Historial de Parámetros - {{ $aula->nombre }}</h2>

    @if($registros->isEmpty())
        <div class="alert alert-info">No hay registros históricos.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha/Hora</th>
                        <th>Temperatura</th>
                        <th>Iluminación</th>
                        <th>Calidad Aire</th>
                        <th>Ventanas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $registro->temperatura }}°C</td>
                        <td>{{ $registro->iluminacion }}%</td>
                        <td>{{ $registro->calidad_aire }}</td>
                        <td>{{ $registro->estado_ventanas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-3">
        <a href="{{ route('ambiente.show', $aula) }}" class="btn btn-primary">Volver al Panel Actual</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    </div>
</div>
@endsection