@extends('layouts.app')

@section('title', 'Lista de Aulas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Aulas</h2>
    <a href="{{ route('aulas.create') }}" class="btn btn-primary">Crear Nueva Aula</a>
</div>

@if($aulas->isEmpty())
    <div class="alert alert-info">No hay aulas registradas.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aulas as $aula)
                <tr>
                    <td>{{ $aula->id }}</td>
                    <td>{{ $aula->nombre }}</td>
                    <td>{{ $aula->lugar }}</td>
                    <td>{{ $aula->capacidad }}</td>
                    <td>{{ $aula->estado }}</td>
                    <td>
                        <a href="{{ route('aulas.show', $aula) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('aulas.destroy', $aula) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta aula?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection