<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diferenciais', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('sub_title', 200);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diferenciais');
    }
};