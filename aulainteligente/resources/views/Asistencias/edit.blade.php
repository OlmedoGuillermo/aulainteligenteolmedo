@extends('layouts.app')

@section('title', 'Editar Asistencia')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Asistencia: {{ $asistencia->nombre_estudiante }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('asistencias.update', $asistencia) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="clase_id" class="form-label">Clase</label>
                <select class="form-select" id="clase_id" name="clase_id" required>
                    @foreach($clases as $clase)
                        <option value="{{ $clase->id }}" {{ $asistencia->clase_id == $clase->id ? 'selected' : '' }}>
                            {{ $clase->materia }} - {{ $clase->dia }} ({{ $clase->modulo }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nombre_estudiante" class="form-label">Nombre del Estudiante</label>
                <input type="text" class="form-control" id="nombre_estudiante" name="nombre_estudiante" value="{{ $asistencia->nombre_estudiante }}" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="presente" {{ $asistencia->estado == 'presente' ? 'selected' : '' }}>Presente</option>
                    <option value="ausente" {{ $asistencia->estado == 'ausente' ? 'selected' : '' }}>Ausente</option>
                    <option value="tardanza" {{ $asistencia->estado == 'tardanza' ? 'selected' : '' }}>Tardanza</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $asistencia->fecha }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection