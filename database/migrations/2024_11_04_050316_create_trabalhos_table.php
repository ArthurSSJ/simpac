<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trabalhos', function (Blueprint $table) {
            $table->id(); // ID autoincremento
            $table->string('titulo'); // Título do trabalho
            $table->text('resumo'); // Resumo do trabalho
            $table->string('protocolo')->unique(); // Protocolo único
            $table->string('curso'); // Campo para o curso
            $table->string('modelo_avaliativo')->nullable(); // Modelo avaliativo
            $table->timestamps(); // Campos de timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabalhos');
    }
};
