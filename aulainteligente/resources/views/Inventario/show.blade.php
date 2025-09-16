@extends('layouts.app')

@section('title', 'Inventario - ' . $aula->nombre)

@section('content')
<div class="container mt-4">
    <h2>🪑 Inventario - {{ $aula->nombre }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <h4>Agregar Nuevo Ítem</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('inventario.store') }}" method="POST">
                @csrf
                <input type="hidden" name="aula_id" value="{{ $aula->id }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select" id="tipo" name="tipo" required>
                            <option value="silla">Silla</option>
                            <option value="mesa">Mesa</option>
                            <option value="pizarrón">Pizarrón</option>
                            <option value="proyector">Proyector</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="1" required>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>

    @if($inventarios->isEmpty())
        <div class="alert alert-info">No hay ítems en el inventario.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventarios as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ ucfirst($item->tipo) }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>
                            <a href="{{ route('inventario.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('inventario.destroy', $item) }}" method="POST" style="display:inline;">
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

    <div class="mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    </div>
</div>
@endsection