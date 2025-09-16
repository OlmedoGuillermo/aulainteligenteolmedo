@extends('layouts.app')

@section('title', 'Editar Aula')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Aula: {{ $aula->nombre }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('aulas.update', $aula) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $aula->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="lugar" class="form-label">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" value="{{ $aula->lugar }}" required>
            </div>
            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ $aula->capacidad }}" min="1" max="200" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="Activa" {{ $aula->estado == 'Activa' ? 'selected' : '' }}>Activa</option>
                    <option value="En mantenimiento" {{ $aula->estado == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
                    <option value="Inactiva" {{ $aula->estado == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection