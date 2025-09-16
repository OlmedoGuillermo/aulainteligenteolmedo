<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'dispositivos';
    protected $fillable = [
        'nombre',
        'tipo',
        'estado',
        'aula_id',
    ];

    // Relación: un dispositivo pertenece a una aula
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}