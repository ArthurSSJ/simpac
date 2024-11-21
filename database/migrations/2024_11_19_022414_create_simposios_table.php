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
        Schema::create('simposios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamp('inicio')->nullable();
            $table->timestamp('fim')->nullable();
            $table->boolean('finalizado')->default(false);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simposios');
    }
};
