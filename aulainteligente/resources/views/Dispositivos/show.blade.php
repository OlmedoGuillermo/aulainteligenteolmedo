@extends('layouts.app')

@section('title', 'Detalle de Dispositivo')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalle de Dispositivo: {{ $dispositivo->nombre }}</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $dispositivo->id }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $dispositivo->nombre }}</li>
            <li class="list-group-item"><strong>Tipo:</strong> {{ $dispositivo->tipo }}</li>
            <li class="list-group-item"><strong>Estado:</strong> {{ $dispositivo->estado }}</li>
            <li class="list-group-item"><strong>Aula:</strong> {{ $dispositivo->aula->nombre ?? 'No asignada' }}</li>
            <li class="list-group-item"><strong>Creado:</strong> {{ $dispositivo->created_at }}</li>
        </ul>
        <div class="mt-3">
            <a href="{{ route('dispositivos.edit', $dispositivo) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('dispositivos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection