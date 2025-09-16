@extends('layouts.app')

@section('title', 'Detalle de Asistencia')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Asistencia de: {{ $asistencia->nombre_estudiante }}</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $asistencia->id }}</li>
            <li class="list-group-item"><strong>Clase:</strong> {{ $asistencia->clase->materia ?? 'No asignada' }} ({{ $asistencia->clase->dia ?? '' }})</li>
            <li class="list-group-item"><strong>Estudiante:</strong> {{ $asistencia->nombre_estudiante }}</li>
            <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($asistencia->estado) }}</li>
            <li class="list-group-item"><strong>Fecha:</strong> {{ $asistencia->fecha }}</li>
            <li class="list-group-item"><strong>Registrada:</strong> {{ $asistencia->created_at }}</li>
        </ul>
        <div class="mt-3">
            <a href="{{ route('asistencias.edit', $asistencia) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection