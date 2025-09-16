<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $fillable = [
        'clase_id',
        'nombre_estudiante',
        'estado',
        'fecha',
    ];

    // Relación: una asistencia pertenece a una clase
    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }
}