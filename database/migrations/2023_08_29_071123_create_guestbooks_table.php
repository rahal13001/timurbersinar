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
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('pegawai', 100);
            $table->string('instansi', 100);
            $table->string('no_hp', 16);
            $table->string('email', 100);
            $table->string('jk', 20);
            $table->date('tanggal');
            $table->time('datang');
            $table->time('pulang')->nullable();
            $table->string('keperluan', 255)->nullable();
            $table->string('lokasi', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guestbooks');
    }
};
