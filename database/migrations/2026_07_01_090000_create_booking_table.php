<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kendaraan_id')
                  ->constrained('kendaraan')
                  ->onDelete('cascade');

            $table->string('nama_pelanggan');

            $table->string('no_hp');

            $table->date('tanggal_mulai');

            $table->date('tanggal_selesai');

            $table->text('catatan')->nullable();

            $table->bigInteger('total_harga')->default(0);

            $table->enum('status', ['pending', 'dikonfirmasi', 'ditolak', 'selesai'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
