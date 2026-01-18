<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('empreendimentos', function (Blueprint $table) {
            // Adicionar campos de endereço
            $table->string('rua')->nullable()->after('cidade');
            $table->string('numero')->nullable()->after('rua');
            $table->string('estado')->nullable()->after('numero');

            // Remover campos de latitude/longitude (opcional - manter para compatibilidade)
            // $table->dropColumn(['local_lat', 'local_long']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empreendimentos', function (Blueprint $table) {
            $table->dropColumn(['rua', 'numero', 'estado']);
        });
    }
};
