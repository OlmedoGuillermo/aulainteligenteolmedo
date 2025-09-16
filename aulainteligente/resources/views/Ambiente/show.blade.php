@extends('layouts.app')

@section('title', 'Ambiente - ' . $aula->nombre)

@section('content')
<div class="container mt-4">
    <h2>🌬️ Parámetros Ambientales - {{ $aula->nombre }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-light">
                <div class="card-body">
                    <h5>🌡️ Temperatura</h5>
                    <h3 class="text-primary">{{ $ambiente->temperatura }}°C</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-light">
                <div class="card-body">
                    <h5>💡 Iluminación</h5>
                    <h3 class="text-warning">{{ $ambiente->iluminacion }}%</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-light">
                <div class="card-body">
                    <h5>🍃 Calidad del Aire</h5>
                    <h3 class="{{ $ambiente->calidad_aire == 'Buena' ? 'text-success' : ($ambiente->calidad_aire == 'Regular' ? 'text-warning' : 'text-danger') }}">
                        {{ $ambiente->calidad_aire }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-light">
                <div class="card-body">
                    <h5>🪟 Ventanas</h5>
                    <h3 class="{{ $ambiente->estado_ventanas == 'Abiertas' ? 'text-info' : 'text-secondary' }}">
                        {{ $ambiente->estado_ventanas }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Actualizar Parámetros (Simulación)</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('ambiente.update', $aula) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <label for="temperatura" class="form-label">Temperatura (°C)</label>
                        <input type="number" step="0.1" class="form-control" id="temperatura" name="temperatura" value="{{ $ambiente->temperatura }}" required>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label for="iluminacion" class="form-label">Iluminación (%)</label>
                        <input type="number" class="form-control" id="iluminacion" name="iluminacion" value="{{ $ambiente->iluminacion }}" min="0" max="100" required>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label for="calidad_aire" class="form-label">Calidad del Aire</label>
                        <select class="form-select" id="calidad_aire" name="calidad_aire" required>
                            <option value="Buena" {{ $ambiente->calidad_aire == 'Buena' ? 'selected' : '' }}>Buena</option>
                            <option value="Regular" {{ $ambiente->calidad_aire == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="Mala" {{ $ambiente->calidad_aire == 'Mala' ? 'selected' : '' }}>Mala</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label for="estado_ventanas" class="form-label">Estado Ventanas</label>
                        <select class="form-select" id="estado_ventanas" name="estado_ventanas" required>
                            <option value="Abiertas" {{ $ambiente->estado_ventanas == 'Abiertas' ? 'selected' : '' }}>Abiertas</option>
                            <option value="Cerradas" {{ $ambiente->estado_ventanas == 'Cerradas' ? 'selected' : '' }}>Cerradas</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('ambiente.historial', $aula) }}" class="btn btn-outline-secondary">Ver Historial</a>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    </div>
</div>
@endsection