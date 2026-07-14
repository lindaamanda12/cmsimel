<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraan', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kategori_id')
                  ->constrained('kategori')
                  ->onDelete('cascade');

            $table->string('nama_kendaraan');

            $table->string('merk')->nullable();

            $table->integer('tahun');

            $table->bigInteger('harga');

            $table->text('fasilitas');

            $table->text('deskripsi')->nullable();

            $table->string('foto')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
