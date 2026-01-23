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
        Schema::table('homes', function (Blueprint $table) {
            $table->string('video_capa')->nullable()->after('horario_atendimento');
        });

        Schema::table('abouts', function (Blueprint $table) {
            $table->string('video_capa')->nullable()->after('text_about');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('video_capa');
        });

        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('video_capa');
        });
    }
};
