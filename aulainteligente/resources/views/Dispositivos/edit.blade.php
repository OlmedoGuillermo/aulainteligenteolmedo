@extends('layouts.app')

@section('title', 'Editar Dispositivo')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Dispositivo: {{ $dispositivo->nombre }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('dispositivos.update', $dispositivo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $dispositivo->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="foco" {{ $dispositivo->tipo == 'foco' ? 'selected' : '' }}>Foco</option>
                    <option value="aire" {{ $dispositivo->tipo == 'aire' ? 'selected' : '' }}>Aire acondicionado</option>
                    <option value="proyector" {{ $dispositivo->tipo == 'proyector' ? 'selected' : '' }}>Proyector</option>
                    <option value="persiana" {{ $dispositivo->tipo == 'persiana' ? 'selected' : '' }}>Persiana</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="Encendido" {{ $dispositivo->estado == 'Encendido' ? 'selected' : '' }}>Encendido</option>
                    <option value="Apagado" {{ $dispositivo->estado == 'Apagado' ? 'selected' : '' }}>Apagado</option>
                    <option value="En mantenimiento" {{ $dispositivo->estado == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="aula_id" class="form-label">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    <option value="">Seleccionar aula</option>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" {{ $dispositivo->aula_id == $aula->id ? 'selected' : '' }}>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('dispositivos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection