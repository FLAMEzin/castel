<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            // Chave estrangeira ligando ao empreendimento
            $table->foreignId('empreendimento_id')
                  ->constrained('empreendimentos')
                  ->onDelete('cascade'); 
            
            $table->string('sub_title', 200);
            $table->string('file_name', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fotos');
    }
};