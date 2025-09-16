<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ambientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->float('temperatura')->default(22.0); // en °C
            $table->integer('iluminacion')->default(50); // en %
            $table->string('calidad_aire')->default('Buena'); // Buena, Regular, Mala
            $table->string('estado_ventanas')->default('Cerradas'); // Abiertas, Cerradas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ambientes');
    }
};