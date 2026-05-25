<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inspeksi', function (Blueprint $table) {

            $table->string('foto_beban_r')->nullable();
            $table->string('foto_beban_s')->nullable();
            $table->string('foto_beban_t')->nullable();
            $table->string('foto_beban_n')->nullable();

            $table->string('foto_tegangan_ujung')->nullable();
            $table->string('foto_pelanggan')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('inspeksi', function (Blueprint $table) {

            $table->dropColumn([

                'foto_beban_r',
                'foto_beban_s',
                'foto_beban_t',
                'foto_beban_n',
                'foto_tegangan_ujung',
                'foto_pelanggan'

            ]);

        });
    }
};