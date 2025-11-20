<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->string('endereco', 200);
            $table->string('whatsapp_business', 20);
            $table->string('title', 100);
            $table->string('sub_title', 200);
            $table->string('horario_atendimento', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('homes');
    }
};