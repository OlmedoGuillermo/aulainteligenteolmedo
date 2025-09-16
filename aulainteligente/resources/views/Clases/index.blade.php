@extends('layouts.app')

@section('title', 'Lista de Clases')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Clases</h2>
    <a href="{{ route('clases.create') }}" class="btn btn-primary">Crear Nueva Clase</a>
</div>

@if($clases->isEmpty())
    <div class="alert alert-info">No hay clases registradas.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Materia</th>
                    <th>Profesor</th>
                    <th>Día</th>
                    <th>Módulo</th>
                    <th>Aula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clases as $clase)
                <tr>
                    <td>{{ $clase->id }}</td>
                    <td>{{ $clase->materia }}</td>
                    <td>{{ $clase->profesor }}</td>
                    <td>{{ $clase->dia }}</td>
                    <td>{{ $clase->modulo }}</td>
                    <td>{{ $clase->aula->nombre ?? 'Sin aula' }}</td>
                    <td>
                        <a href="{{ route('clases.show', $clase) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clases.edit', $clase) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clases.destroy', $clase) }}" method="POST" style="display:inline;">
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