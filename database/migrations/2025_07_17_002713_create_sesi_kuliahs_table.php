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
        Schema::create('sesi_kuliahs', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('jam', 11);
            $table->smallInteger('sks')->default(0);
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->integer('status')->default(1);
            $table->unique(['jam_mulai', 'jam_selesai'], 'jam_unik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_kuliahs');
    }
};