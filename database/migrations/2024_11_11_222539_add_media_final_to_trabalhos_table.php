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
        Schema::table('trabalhos', function (Blueprint $table) {
            $table->float('media_final')->nullable()->after('modelo_avaliativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trabalhos', function (Blueprint $table) {
            $table->dropColumn('media_final');
        });
    }
};

