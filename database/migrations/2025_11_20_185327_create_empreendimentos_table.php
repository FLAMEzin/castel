<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empreendimentos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('descricao');
            $table->integer('tipo'); // Considere usar enum ou boolean se forem poucos tipos
            $table->integer('area');
            $table->integer('quartos');
            $table->string('cidade', 50);
            $table->float('local_lat', 10, 6); // Ajustado para precisão de coordenadas
            $table->float('local_long', 10, 6);
            $table->float('valor'); // Para dinheiro, o ideal seria $table->decimal('valor', 15, 2);
            $table->integer('destaque_home'); // Considere usar $table->boolean('destaque_home');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empreendimentos');
    }
};