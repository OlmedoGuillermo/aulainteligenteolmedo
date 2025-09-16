@extends('layouts.app')

@section('title', 'Detalle de Aula')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalle de Aula: {{ $aula->nombre }}</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $aula->id }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $aula->nombre }}</li>
            <li class="list-group-item"><strong>Lugar:</strong> {{ $aula->lugar }}</li>
            <li class="list-group-item"><strong>Capacidad:</strong> {{ $aula->capacidad }} personas</li>
            <li class="list-group-item"><strong>Estado:</strong> {{ $aula->estado }}</li>
            <li class="list-group-item"><strong>Creada:</strong> {{ $aula->created_at }}</li>
        </ul>
        <div class="mt-3">
            <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection