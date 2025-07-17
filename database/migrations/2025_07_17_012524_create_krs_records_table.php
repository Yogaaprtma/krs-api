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
        Schema::create('krs_records', function (Blueprint $table) {
            $table->id();
            $table->string('ta', 10);
            $table->string('kdmk');
            $table->unsignedInteger('id_jadwal');
            $table->string('nim_dinus', 50);
            $table->char('sts', 1);
            $table->integer('sks');
            $table->tinyInteger('modul')->default(0);
            $table->timestamps();

            $table->foreign('ta')->references('kode')->on('tahun_ajarans')->onDelete('cascade');
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulums')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwal_tawars')->onDelete('cascade');
            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinuses')->onDelete('cascade');
            $table->index('ta', 'PERIODE');
            $table->index('nim_dinus', 'MAHASISWA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs_records');
    }
};