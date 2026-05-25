<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspeksi', function (Blueprint $table) {

            $table->id();

            $table->string('nama_petugas');
            $table->string('nip_petugas');

            $table->string('ulp');
            $table->string('id_gardu');
            $table->string('merk');
            $table->string('alamat');
            $table->string('penyulang');
            $table->string('daya');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspeksi');
    }
};