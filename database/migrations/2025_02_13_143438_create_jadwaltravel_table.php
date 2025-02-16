<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwaltravel', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_travel');
            $table->string('asal_travel');
            $table->string('tujuan_travel');
            $table->string('tanggal_travel');
            $table->string('jam_travel');
            $table->string('harga_travel');
            $table->string('kuota_travel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwaltravel');
    }
};
