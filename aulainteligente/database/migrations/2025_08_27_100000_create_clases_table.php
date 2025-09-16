<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('materia'); // Matemáticas, Física, Programación, Historia
            $table->string('profesor'); // Nombre del profesor (simulado, sin usuarios aún)
            $table->string('dia'); // Lunes, Martes, Miércoles, Jueves, Viernes
            $table->string('modulo'); // "07:00 - 08:30", "08:40 - 10:10", etc.
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clases');
    }
};