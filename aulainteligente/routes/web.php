<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// Página de inicio (dashboard de gestión)
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Módulo: Aulas
Route::prefix('aulas')->name('aulas.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AulaController::class, 'index'])->name('index');         // Listar aulas
    Route::get('/create', [\App\Http\Controllers\AulaController::class, 'create'])->name('create'); // Formulario crear
    Route::post('/', [\App\Http\Controllers\AulaController::class, 'store'])->name('store');        // Guardar nueva aula
    Route::get('/{aula}', [\App\Http\Controllers\AulaController::class, 'show'])->name('show');     // Ver detalle
    Route::get('/{aula}/edit', [\App\Http\Controllers\AulaController::class, 'edit'])->name('edit'); // Formulario editar
    Route::put('/{aula}', [\App\Http\Controllers\AulaController::class, 'update'])->name('update'); // Actualizar
    Route::delete('/{aula}', [\App\Http\Controllers\AulaController::class, 'destroy'])->name('destroy'); // Eliminar
});

// Módulo: Dispositivos
Route::prefix('dispositivos')->name('dispositivos.')->group(function () {
    Route::get('/', [\App\Http\Controllers\DispositivoController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\DispositivoController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\DispositivoController::class, 'store'])->name('store');
    Route::get('/{dispositivo}/edit', [\App\Http\Controllers\DispositivoController::class, 'edit'])->name('edit');
    Route::put('/{dispositivo}', [\App\Http\Controllers\DispositivoController::class, 'update'])->name('update');
    Route::delete('/{dispositivo}', [\App\Http\Controllers\DispositivoController::class, 'destroy'])->name('destroy');
    Route::post('/{dispositivo}/control', [\App\Http\Controllers\DispositivoController::class, 'control'])->name('control'); // Acción: encender/apagar
});

// Módulo: Clases
Route::prefix('clases')->name('clases.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ClaseController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\ClaseController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\ClaseController::class, 'store'])->name('store');
    Route::get('/{clase}', [\App\Http\Controllers\ClaseController::class, 'show'])->name('show');
    Route::get('/{clase}/edit', [\App\Http\Controllers\ClaseController::class, 'edit'])->name('edit');
    Route::put('/{clase}', [\App\Http\Controllers\ClaseController::class, 'update'])->name('update');
    Route::delete('/{clase}', [\App\Http\Controllers\ClaseController::class, 'destroy'])->name('destroy');
});

// Módulo: Asistencia
// Módulo: Asistencia
Route::prefix('asistencias')->name('asistencias.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AsistenciaController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\AsistenciaController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\AsistenciaController::class, 'store'])->name('store');
    Route::get('/{asistencia}', [\App\Http\Controllers\AsistenciaController::class, 'show'])->name('show');
    Route::get('/{asistencia}/edit', [\App\Http\Controllers\AsistenciaController::class, 'edit'])->name('edit');
    Route::put('/{asistencia}', [\App\Http\Controllers\AsistenciaController::class, 'update'])->name('update');
    Route::delete('/{asistencia}', [\App\Http\Controllers\AsistenciaController::class, 'destroy'])->name('destroy');
});

// Módulo: Ambiente (sensores y parámetros)
Route::prefix('ambiente')->name('ambiente.')->group(function () {
    Route::get('/aula/{aula}', [\App\Http\Controllers\AmbienteController::class, 'show'])->name('show');
    Route::get('/historial/{aula}', [\App\Http\Controllers\AmbienteController::class, 'historial'])->name('historial');
    Route::post('/aula/{aula}/update', [\App\Http\Controllers\AmbienteController::class, 'update'])->name('update');
});
// Módulo: Inventario
Route::prefix('inventario')->name('inventario.')->group(function () {
    Route::get('/aula/{aula}', [\App\Http\Controllers\InventarioController::class, 'show'])->name('show');
    Route::post('/', [\App\Http\Controllers\InventarioController::class, 'store'])->name('store');
    Route::get('/{inventario}/edit', [\App\Http\Controllers\InventarioController::class, 'edit'])->name('edit');
    Route::put('/{inventario}', [\App\Http\Controllers\InventarioController::class, 'update'])->name('update');
    Route::delete('/{inventario}', [\App\Http\Controllers\InventarioController::class, 'destroy'])->name('destroy');
});
//Actividad de chartJS
Route::get('/charts/asistencia', [\App\Http\Controllers\DashboardController::class, 'chartAsistencia'])->name('charts.asistencia');
Route::get('/charts/pokemon', [\App\Http\Controllers\DashboardController::class, 'chartPokemon'])->name('charts.pokemon');