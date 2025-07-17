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
        Schema::create('sesi_kuliah_bentroks', function (Blueprint $table) {
            $table->unsignedSmallInteger('id');
            $table->unsignedSmallInteger('id_bentrok');
            $table->primary(['id', 'id_bentrok']);
            $table->foreign('id')->references('id')->on('sesi_kuliahs')->onDelete('cascade');
            $table->foreign('id_bentrok')->references('id')->on('sesi_kuliahs')->onDelete('cascade');
            $table->index('id_bentrok', 'FK_sesi_kuliah_bentrok2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_kuliah_bentroks');
    }
};
