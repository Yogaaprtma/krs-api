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
        Schema::create('jadwal_tawars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ta');
            $table->string('kdmk');
            $table->string('klpk', 15);
            $table->string('klpk_2', 15)->nullable();
            $table->integer('kdds');
            $table->integer('kdds2')->nullable();
            $table->integer('jmax')->default(0);
            $table->integer('jsisa')->default(0);
            $table->tinyInteger('id_hari1');
            $table->tinyInteger('id_hari2');
            $table->tinyInteger('id_hari3');
            $table->unsignedSmallInteger('id_sesi1');
            $table->unsignedSmallInteger('id_sesi2');
            $table->unsignedSmallInteger('id_sesi3');
            $table->unsignedInteger('id_ruang1');
            $table->unsignedInteger('id_ruang2');
            $table->unsignedInteger('id_ruang3');
            $table->tinyInteger('jns_jam');
            $table->tinyInteger('open_class')->default(1);
            $table->timestamps();

            $table->foreign('ta')->references('kode')->on('tahun_ajarans')->onDelete('cascade');
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulums')->onDelete('cascade');
            $table->foreign('id_hari1')->references('id')->on('haris')->onDelete('cascade');
            $table->foreign('id_hari2')->references('id')->on('haris')->onDelete('cascade');
            $table->foreign('id_hari3')->references('id')->on('haris')->onDelete('cascade');
            $table->foreign('id_sesi1')->references('id')->on('sesi_kuliahs')->onDelete('cascade');
            $table->foreign('id_sesi2')->references('id')->on('sesi_kuliahs')->onDelete('cascade');
            $table->foreign('id_sesi3')->references('id')->on('sesi_kuliahs')->onDelete('cascade');
            $table->foreign('id_ruang1')->references('id')->on('ruangs')->onDelete('cascade');
            $table->foreign('id_ruang2')->references('id')->on('ruangs')->onDelete('cascade');
            $table->foreign('id_ruang3')->references('id')->on('ruangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_tawars');
    }
};