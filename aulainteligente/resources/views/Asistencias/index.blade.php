@extends('layouts.app')

@section('title', 'Lista de Asistencias')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Asistencias</h2>
    <a href="{{ route('asistencias.create') }}" class="btn btn-primary">Registrar Asistencia</a>
</div>

@if($asistencias->isEmpty())
    <div class="alert alert-info">No hay registros de asistencia.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clase</th>
                    <th>Estudiante</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->id }}</td>
                    <td>{{ $asistencia->clase->materia ?? 'Sin clase' }} ({{ $asistencia->clase->dia ?? '' }})</td>
                    <td>{{ $asistencia->nombre_estudiante }}</td>
                    <td>{{ ucfirst($asistencia->estado) }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>
                        <a href="{{ route('asistencias.show', $asistencia) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('asistencias.edit', $asistencia) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('asistencias.destroy', $asistencia) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection