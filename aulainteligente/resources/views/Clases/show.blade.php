@extends('layouts.app')

@section('title', 'Detalle de Clase')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Clase de {{ $clase->materia }}</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $clase->id }}</li>
            <li class="list-group-item"><strong>Materia:</strong> {{ $clase->materia }}</li>
            <li class="list-group-item"><strong>Profesor:</strong> {{ $clase->profesor }}</li>
            <li class="list-group-item"><strong>Día:</strong> {{ $clase->dia }}</li>
            <li class="list-group-item"><strong>Módulo:</strong> {{ $clase->modulo }}</li>
            <li class="list-group-item"><strong>Aula:</strong> {{ $clase->aula->nombre ?? 'No asignada' }}</li>
            <li class="list-group-item"><strong>Creada:</strong> {{ $clase->created_at }}</li>
        </ul>
        <div class="mt-3">
            <a href="{{ route('clases.edit', $clase) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('clases.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection