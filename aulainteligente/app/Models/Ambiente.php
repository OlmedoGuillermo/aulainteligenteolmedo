<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambientes';
    protected $fillable = [
        'aula_id',
        'temperatura',
        'iluminacion',
        'calidad_aire',
        'estado_ventanas',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}