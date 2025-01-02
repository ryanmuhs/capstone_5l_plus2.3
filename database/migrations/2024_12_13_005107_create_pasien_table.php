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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ktp')->unique();
            $table->string('no_kontak');
            $table->string('lahir_tempat')->default('-');
            $table->date('lahir_tanggal');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('password');
            $table->string('provinsi')->default('-');
            $table->string('kab_kota')->default('-');
            $table->string('kecamatan')->default('-');
            $table->string('rt_rw')->default('-');
            $table->enum('metode_pembayaran', ['umum', 'bpjs'])->default('umum');
            $table->string('no_bpjs')->nullable()->unique();
            $table->date('tanggal_reservasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
