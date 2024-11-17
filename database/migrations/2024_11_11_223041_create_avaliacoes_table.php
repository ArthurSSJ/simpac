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
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trabalho_id')->constrained('trabalhos')->onDelete('cascade');
            $table->foreignId('avaliador_id')->constrained('users')->onDelete('cascade'); // Ajuste conforme a tabela de avaliadores
            $table->float('nota'); // Nota total atribuída ao trabalho pelo avaliador
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
