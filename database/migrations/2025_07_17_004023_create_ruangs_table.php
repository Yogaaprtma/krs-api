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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 250);
            $table->string('nama2', 250)->default('-');
            $table->integer('id_jenis_makul')->nullable();
            $table->string('id_fakultas', 5)->nullable();
            $table->integer('kapasitas')->default(0);
            $table->integer('kap_ujian')->default(0);
            $table->smallInteger('status')->default(1);
            $table->string('luas', 5)->default('0');
            $table->string('kondisi', 50)->nullable();
            $table->integer('jumlah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangs');
    }
};