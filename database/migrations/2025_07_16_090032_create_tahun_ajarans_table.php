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
        Schema::create('tahun_ajarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('tahun_akhir');
            $table->string('tahun_awal');
            $table->tinyInteger('jns_smt');
            $table->tinyInteger('set_aktif');
            $table->tinyInteger('biku_tagih_jenis')->default(0);
            $table->dateTime('update_time')->nullable();
            $table->string('update_id', 18)->nullable();
            $table->string('update_host', 18)->nullable();
            $table->dateTime('added_time')->nullable();
            $table->string('added_id', 18)->nullable();
            $table->string('added_host', 18)->nullable();
            $table->date('tgl_masuk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_ajarans');
    }
};