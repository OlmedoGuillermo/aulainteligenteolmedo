<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clases';
    protected $fillable = [
        'materia',
        'profesor',
        'dia',
        'modulo',
        'aula_id',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}