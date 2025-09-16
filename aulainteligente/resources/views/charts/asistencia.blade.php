@extends('layouts.app')

@section('title', 'Gráfico de Asistencia')

@section('content')
<div class="container mt-4">
    <h2> Gráfico de Asistencia por Mes</h2>

    <canvas id="asistenciaChart" width="400" height="200"></canvas>

    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    </div>
</div>

<script>
    // Datos simulados
    const labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'];
    const data = [15, 20, 25, 30, 28, 35];

    // Configurar el gráfico
    const ctx = document.getElementById('asistenciaChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Asistencia mensual',
                data: data,
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection