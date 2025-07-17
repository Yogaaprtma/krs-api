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
        Schema::create('matkul_kurikulums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kdmk')->unique();
            $table->string('prodi')->nullable();
            $table->string('nmmk');
            $table->string('nmen');
            $table->enum('tp', ['T', 'P', 'TP']);
            $table->integer('sks');
            $table->smallInteger('sks_t');
            $table->smallInteger('sks_p');
            $table->integer('smt');
            $table->tinyInteger('jns_smt');
            $table->tinyInteger('aktif');
            $table->string('kur_nama');
            $table->enum('kelompok_makul', ['MPK', 'MKK', 'MKB', 'MKD', 'MBB', 'MPB']);
            $table->boolean('kur_aktif');
            $table->enum('jenis_matkul', ['wajib', 'pilihan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkul_kurikulums');
    }
};