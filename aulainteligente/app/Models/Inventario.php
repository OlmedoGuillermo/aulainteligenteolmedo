<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $fillable = [
        'aula_id',
        'tipo',
        'cantidad',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}