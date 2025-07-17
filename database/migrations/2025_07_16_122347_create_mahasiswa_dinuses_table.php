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
        Schema::create('mahasiswa_dinuses', function (Blueprint $table) {
            $table->id();
            $table->string('nim_dinus', 50)->unique();
            $table->integer('ta_masuk')->nullable();
            $table->string('prodi', 5)->nullable();
            $table->string('pass_mhs', 128)->nullable();
            $table->tinyInteger('kelas');
            $table->char('akdm_stat', 2);
            $table->index('akdm_stat', 'STS_AKD_MHS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_dinuses');
    }
};