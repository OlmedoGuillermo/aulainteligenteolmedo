@extends('layouts.app')

@section('title', 'Lista de Dispositivos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Dispositivos</h2>
    <a href="{{ route('dispositivos.create') }}" class="btn btn-primary">Crear Nuevo Dispositivo</a>
</div>

@if($dispositivos->isEmpty())
    <div class="alert alert-info">No hay dispositivos registrados.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Aula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dispositivos as $dispositivo)
                <tr>
                    <td>{{ $dispositivo->id }}</td>
                    <td>{{ $dispositivo->nombre }}</td>
                    <td>{{ $dispositivo->tipo }}</td>
                    <td>{{ $dispositivo->estado }}</td>
                    <td>{{ $dispositivo->aula->nombre ?? 'Sin aula' }}</td>
                    <td>
                        <a href="{{ route('dispositivos.show', $dispositivo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('dispositivos.edit', $dispositivo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('dispositivos.destroy', $dispositivo) }}" method="POST" style="display:inline;">
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