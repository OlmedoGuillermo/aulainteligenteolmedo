@extends('layouts.app')

@section('title', 'Editar Clase')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Clase: {{ $clase->materia }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('clases.update', $clase) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="materia" class="form-label">Materia</label>
                <select class="form-select" id="materia" name="materia" required>
                    <option value="Matemáticas" {{ $clase->materia == 'Matemáticas' ? 'selected' : '' }}>Matemáticas</option>
                    <option value="Física" {{ $clase->materia == 'Física' ? 'selected' : '' }}>Física</option>
                    <option value="Programación" {{ $clase->materia == 'Programación' ? 'selected' : '' }}>Programación</option>
                    <option value="Historia" {{ $clase->materia == 'Historia' ? 'selected' : '' }}>Historia</option>
                    <option value="Química" {{ $clase->materia == 'Química' ? 'selected' : '' }}>Química</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <input type="text" class="form-control" id="profesor" name="profesor" value="{{ $clase->profesor }}" required>
            </div>
            <div class="mb-3">
                <label for="dia" class="form-label">Día</label>
                <select class="form-select" id="dia" name="dia" required>
                    <option value="Lunes" {{ $clase->dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                    <option value="Martes" {{ $clase->dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                    <option value="Miércoles" {{ $clase->dia == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                    <option value="Jueves" {{ $clase->dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                    <option value="Viernes" {{ $clase->dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="modulo" class="form-label">Módulo (Horario)</label>
                <select class="form-select" id="modulo" name="modulo" required>
                    <option value="07:00 - 08:30" {{ $clase->modulo == '07:00 - 08:30' ? 'selected' : '' }}>07:00 - 08:30</option>
                    <option value="08:40 - 10:10" {{ $clase->modulo == '08:40 - 10:10' ? 'selected' : '' }}>08:40 - 10:10</option>
                    <option value="10:30 - 12:00" {{ $clase->modulo == '10:30 - 12:00' ? 'selected' : '' }}>10:30 - 12:00</option>
                    <option value="13:00 - 14:30" {{ $clase->modulo == '13:00 - 14:30' ? 'selected' : '' }}>13:00 - 14:30</option>
                    <option value="14:40 - 16:10" {{ $clase->modulo == '14:40 - 16:10' ? 'selected' : '' }}>14:40 - 16:10</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="aula_id" class="form-label">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" {{ $clase->aula_id == $aula->id ? 'selected' : '' }}>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('clases.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection