<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->string('email', 100)->nullable()->change();
            $table->string('phone', 20)->nullable()->change();
            $table->string('endereco', 200)->nullable()->change();
            $table->string('whatsapp_business', 20)->nullable()->change();
            $table->string('title', 100)->nullable()->change();
            $table->string('sub_title', 200)->nullable()->change();
            $table->string('horario_atendimento', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->string('email', 100)->nullable(false)->change();
            $table->string('phone', 20)->nullable(false)->change();
            $table->string('endereco', 200)->nullable(false)->change();
            $table->string('whatsapp_business', 20)->nullable(false)->change();
            $table->string('title', 100)->nullable(false)->change();
            $table->string('sub_title', 200)->nullable(false)->change();
            $table->string('horario_atendimento', 50)->nullable(false)->change();
        });
    }
};
