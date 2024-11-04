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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID autoincremento
            $table->string('name'); // Nome do usuário
            $table->string('email')->unique(); // Email único
            $table->string('password'); // Senha
            $table->string('role')->default('user'); // Papel do usuário
            $table->timestamps(); // Campos de timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
