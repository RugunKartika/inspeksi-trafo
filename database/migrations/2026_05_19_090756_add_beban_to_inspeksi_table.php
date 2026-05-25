<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inspeksi', function (Blueprint $table) {

            $table->string('arus_r')->nullable();
            $table->string('arus_s')->nullable();
            $table->string('arus_t')->nullable();
            $table->string('arus_n')->nullable();

            $table->string('tegangan_vr')->nullable();
            $table->string('tegangan_vs')->nullable();
            $table->string('tegangan_vt')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('inspeksi', function (Blueprint $table) {

            $table->dropColumn([
                'arus_r',
                'arus_s',
                'arus_t',
                'arus_n',
                'tegangan_vr',
                'tegangan_vs',
                'tegangan_vt'
            ]);

        });
    }
};