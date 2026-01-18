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
        // SQLite não suporta ALTER COLUMN diretamente, então precisamos recriar a tabela
        // Primeiro, vamos criar uma tabela temporária, copiar os dados, dropar a original e renomear

        // Para SQLite, vamos usar uma abordagem diferente - definir valores padrão
        DB::statement('PRAGMA foreign_keys=off;');

        // Atualizar registros existentes que têm NULL
        DB::table('empreendimentos')
            ->whereNull('local_lat')
            ->update(['local_lat' => 0]);

        DB::table('empreendimentos')
            ->whereNull('local_long')
            ->update(['local_long' => 0]);

        // SQLite tem limitações com ALTER TABLE, então vamos criar uma nova tabela
        DB::statement('
            CREATE TABLE empreendimentos_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title VARCHAR(255),
                descricao TEXT,
                tipo VARCHAR(255),
                area REAL,
                quartos INTEGER,
                cidade VARCHAR(255),
                rua VARCHAR(255),
                numero VARCHAR(255),
                estado VARCHAR(255),
                local_lat REAL DEFAULT 0,
                local_long REAL DEFAULT 0,
                valor REAL,
                destaque_home BOOLEAN DEFAULT 0,
                tags TEXT,
                foto_capa VARCHAR(255),
                foto_planta VARCHAR(255),
                created_at DATETIME,
                updated_at DATETIME
            )
        ');

        // Copiar dados da tabela original
        DB::statement('
            INSERT INTO empreendimentos_new 
            SELECT id, title, descricao, tipo, area, quartos, cidade, rua, numero, estado,
                   COALESCE(local_lat, 0), COALESCE(local_long, 0), valor, destaque_home, tags, 
                   foto_capa, foto_planta, created_at, updated_at
            FROM empreendimentos
        ');

        // Dropar tabela original
        DB::statement('DROP TABLE empreendimentos');

        // Renomear nova tabela
        DB::statement('ALTER TABLE empreendimentos_new RENAME TO empreendimentos');

        DB::statement('PRAGMA foreign_keys=on;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Não é necessário reverter
    }
};
