<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aula Inteligente')</title>
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">🏫 Aula Inteligente</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('aulas.index') }}">Aulas</a>
                <a class="nav-link" href="{{ route('dispositivos.index') }}">Dispositivos</a>
                <a class="nav-link" href="{{ route('clases.index') }}">Clases</a>
                <a class="nav-link" href="{{ route('dispositivos.index') }}">Dispositivos</a>
                <a class="nav-link" href="{{ route('clases.index') }}">Clases</a>
                <a class="nav-link" href="{{ route('asistencias.index') }}">Asistencia</a>
                <a class="nav-link" href="{{ route('inventario.show', 1) }}">Inventario</a>
                <a class="nav-link" href="{{ route('ambiente.show', 1) }}">Ambiente</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>