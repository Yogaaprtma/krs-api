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
        Schema::create('daftar_nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim_dinus', 50)->nullable();
            $table->string('kdmk', 20)->nullable();
            $table->char('nl', 2)->nullable();
            $table->smallInteger('hide')->default(0);
            $table->timestamps();

            $table->foreign('nim_dinus')->references('nim_dinus')->on('mahasiswa_dinuses')->onDelete('cascade');
            $table->foreign('kdmk')->references('kdmk')->on('matkul_kurikulums')->onDelete('cascade');
            $table->index(['nim_dinus', 'kdmk'], 'nim');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_nilais');
    }
};