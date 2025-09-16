@extends('layouts.app')

@section('title', 'Crear Clase')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Nueva Clase</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('clases.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="materia" class="form-label">Materia</label>
                <select class="form-select" id="materia" name="materia" required>
                    <option value="">Seleccionar materia</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="Física">Física</option>
                    <option value="Programación">Programación</option>
                    <option value="Historia">Historia</option>
                    <option value="Química">Química</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <input type="text" class="form-control" id="profesor" name="profesor" required placeholder="Nombre del profesor">
            </div>
            <div class="mb-3">
                <label for="dia" class="form-label">Día</label>
                <select class="form-select" id="dia" name="dia" required>
                    <option value="">Seleccionar día</option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="modulo" class="form-label">Módulo (Horario)</label>
                <select class="form-select" id="modulo" name="modulo" required>
                    <option value="">Seleccionar módulo</option>
                    <option value="07:00 - 08:30">07:00 - 08:30</option>
                    <option value="08:40 - 10:10">08:40 - 10:10</option>
                    <option value="10:30 - 12:00">10:30 - 12:00</option>
                    <option value="13:00 - 14:30">13:00 - 14:30</option>
                    <option value="14:40 - 16:10">14:40 - 16:10</option>
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
            <a href="{{ route('clases.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection