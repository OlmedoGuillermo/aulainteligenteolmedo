@extends('layouts.app')

@section('title', 'Crear Dispositivo')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Nuevo Dispositivo</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('dispositivos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="foco">Foco</option>
                    <option value="aire">Aire acondicionado</option>
                    <option value="proyector">Proyector</option>
                    <option value="persiana">Persiana</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="Encendido">Encendido</option>
                    <option value="Apagado">Apagado</option>
                    <option value="En mantenimiento">En mantenimiento</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="aula_id" class="form-label">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    <option value="">Seleccionar aula</option>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('dispositivos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection