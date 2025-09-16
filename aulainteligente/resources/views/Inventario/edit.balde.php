@extends('layouts.app')

@section('title', 'Editar Ítem de Inventario')

@section('content')
<div class="container mt-4">
    <h2>✏️ Editar Ítem: {{ ucfirst($inventario->tipo) }}</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('inventario.update', $inventario) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="aula_id" class="form-label">Aula</label>
                    <select class="form-select" id="aula_id" name="aula_id" required>
                        @foreach($aulas as $aula)
                            <option value="{{ $aula->id }}" {{ $inventario->aula_id == $aula->id ? 'selected' : '' }}>{{ $aula->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="silla" {{ $inventario->tipo == 'silla' ? 'selected' : '' }}>Silla</option>
                        <option value="mesa" {{ $inventario->tipo == 'mesa' ? 'selected' : '' }}>Mesa</option>
                        <option value="pizarrón" {{ $inventario->tipo == 'pizarrón' ? 'selected' : '' }}>Pizarrón</option>
                        <option value="proyector" {{ $inventario->tipo == 'proyector' ? 'selected' : '' }}>Proyector</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $inventario->cantidad }}" min="1" required>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('inventario.show', $inventario->aula_id) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection