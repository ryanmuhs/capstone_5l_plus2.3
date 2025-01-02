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
        Schema::create('antrian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade')->onUpdate('cascade'); // Relasi ke tabel pasien
            $table->date('tanggal_antrian');
            $table->integer('nomor_antrian');
            $table->enum('poli', ['umum', 'gigi'])->default('umum');
            $table->enum('status', ['menunggu', 'dilayani', 'selesai', 'batal'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian');
    }
};
