@extends('layouts.app')

@section('title', 'Gráfico de Pokémon')

@section('content')
<div class="container mt-4">
    <h2> Tipos de Pokémon</h2>

    <canvas id="pokemonChart" width="400" height="200"></canvas>

    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    </div>
</div>

<script>
    // Función para obtener datos de la API
    async function fetchPokemonData() {
        try {
            const response = await fetch('https://pokeapi.co/api/v2/type/');
            const data = await response.json();

            const labels = data.results.map(type => type.name);
            const counts = data.results.map(type => Math.floor(Math.random() * 100)); // Simulación

            // Configurar el gráfico
            const ctx = document.getElementById('pokemonChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: counts,
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F43',
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F43'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.parsed.y} Pokémon`;
                                }
                            }
                        }
                    }
                }
            });
        } catch (error) {
            console.error('Error al cargar datos:', error);
        }
    }

    // Ejecutar cuando cargue la página
    window.onload = fetchPokemonData;
</script>
@endsection