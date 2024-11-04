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
        Schema::create('trabalho_avaliadores', function (Blueprint $table) {
            $table->id(); // ID autoincremento
            $table->foreignId('trabalho_id')->constrained('trabalhos')->onDelete('cascade'); // Chave estrangeira para trabalhos
            $table->foreignId('avaliador_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para usuários
            $table->timestamps(); // Campos de timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabalho_avaliadores');
    }
};
