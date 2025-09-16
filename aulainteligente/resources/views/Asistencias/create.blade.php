@extends('layouts.app')

@section('title', 'Registrar Asistencia')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Registrar Nueva Asistencia</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('asistencias.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="clase_id" class="form-label">Clase</label>
                <select class="form-select" id="clase_id" name="clase_id" required>
                    <option value="">Seleccionar clase</option>
                    @foreach($clases as $clase)
                        <option value="{{ $clase->id }}">{{ $clase->materia }} - {{ $clase->dia }} ({{ $clase->modulo }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nombre_estudiante" class="form-label">Nombre del Estudiante</label>
                <input type="text" class="form-control" id="nombre_estudiante" name="nombre_estudiante" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="presente">Presente</option>
                    <option value="ausente">Ausente</option>
                    <option value="tardanza">Tardanza</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ date('Y-m-d') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection