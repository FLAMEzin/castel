<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Criar tabela de tipos de imóvel
        Schema::create('tipos_imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();
            $table->timestamps();
        });

        // Inserir os tipos padrão que já existiam no sistema
        $tiposPadrao = [
            ['nome' => 'Apartamento', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Casa', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Terreno/Lote', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Comercial', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cobertura', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Studio', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('tipos_imoveis')->insert($tiposPadrao);

        // Adicionar coluna tipo_imovel_id na tabela empreendimentos
        Schema::table('empreendimentos', function (Blueprint $table) {
            $table->foreignId('tipo_imovel_id')->nullable()->after('tipo')->constrained('tipos_imoveis')->nullOnDelete();
        });

        // Migrar dados existentes: converter o campo 'tipo' (string) para tipo_imovel_id
        $mapeamento = [
            'apartamento' => 1,
            'casa' => 2,
            'terreno' => 3,
            'comercial' => 4,
            'cobertura' => 5,
            'studio' => 6,
        ];

        foreach ($mapeamento as $tipoAntigo => $tipoId) {
            DB::table('empreendimentos')
                ->where('tipo', $tipoAntigo)
                ->update(['tipo_imovel_id' => $tipoId]);
        }

        // Remover a coluna antiga 'tipo'
        Schema::table('empreendimentos', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Adicionar coluna tipo de volta
        Schema::table('empreendimentos', function (Blueprint $table) {
            $table->string('tipo')->nullable()->after('descricao');
        });

        // Migrar dados de volta
        $mapeamento = [
            1 => 'apartamento',
            2 => 'casa',
            3 => 'terreno',
            4 => 'comercial',
            5 => 'cobertura',
            6 => 'studio',
        ];

        foreach ($mapeamento as $tipoId => $tipoAntigo) {
            DB::table('empreendimentos')
                ->where('tipo_imovel_id', $tipoId)
                ->update(['tipo' => $tipoAntigo]);
        }

        // Remover foreign key e coluna
        Schema::table('empreendimentos', function (Blueprint $table) {
            $table->dropForeign(['tipo_imovel_id']);
            $table->dropColumn('tipo_imovel_id');
        });

        Schema::dropIfExists('tipos_imoveis');
    }
};
