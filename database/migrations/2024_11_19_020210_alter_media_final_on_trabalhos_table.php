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
        Schema::table('trabalhos', function (Blueprint $table) {
            $table->decimal('media_final', 5, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('trabalhos', function (Blueprint $table) {
            $table->float('media_final')->nullable()->change(); // Ou volte ao tipo anterior
        });
    }
};
