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
        Schema::create('validasi_krs_mhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim_dinus', 50);
            $table->dateTime('job_date')->nullable();
            $table->string('job_host')->nullable();
            $table->string('job_agent')->nullable();
            $table->string('ta')->nullable();

            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinuses')->onDelete('cascade');
            $table->foreign('ta')->references('kode')->on('tahun_ajarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validasi_krs_mhs');
    }
};