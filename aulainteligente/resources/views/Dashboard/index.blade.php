@extends('layouts.app')

@section('title', 'Dashboard - Aula Inteligente')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">🏫 Panel de Control - Aula Inteligente</h1>

    <div class="row g-4">

        <!-- Tarjeta: Aulas -->
        <div class="col-md-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">🚪 Aulas</h5>
                    <p class="card-text">Gestiona las aulas disponibles.</p>
                    <a href="{{ route('aulas.index') }}" class="btn btn-primary">Ir a Aulas</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Dispositivos -->
        <div class="col-md-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">💡 Dispositivos</h5>
                    <p class="card-text">Controla luces, aire, proyectores.</p>
                    <a href="{{ route('dispositivos.index') }}" class="btn btn-success">Ir a Dispositivos</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Clases -->
        <div class="col-md-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">📚 Clases</h5>
                    <p class="card-text">Asigna clases a aulas con horarios.</p>
                    <a href="{{ route('clases.index') }}" class="btn btn-info">Ir a Clases</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Asistencia -->
        <div class="col-md-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">✅ Asistencia</h5>
                    <p class="card-text">Registra y consulta asistencia.</p>
                    <a href="{{ route('asistencias.index') }}" class="btn btn-warning">Ir a Asistencia</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Ambiente -->
        <div class="col-md-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">🌡️ Ambiente</h5>
                    <p class="card-text">Monitorea temperatura, iluminación.</p>
                    <a href="{{ route('ambiente.show', 1) }}" class="btn btn-secondary">Ver Ambiente</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Inventario -->
        <div class="col-md-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">🪑 Inventario</h5>
                    <p class="card-text">Gestiona sillas, mesas, mobiliario.</p>
                    <a href="{{ route('inventario.show', 1) }}" class="btn btn-dark">Ir a Inventario</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection