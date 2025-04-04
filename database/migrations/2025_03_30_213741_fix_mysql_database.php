<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up()
    {
        Schema::create('kondisi_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('kondisi')->unique();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('alamat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kelurahan');
            $table->unsignedSmallInteger('rt');
            $table->unsignedSmallInteger('rw');
            $table->timestamps();
        });

        Schema::create('data_jalan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->unsignedSmallInteger('lebar');
            $table->unsignedSmallInteger('panjang');
            $table->foreignId('kondisi_jalan_id')->constrained('kondisi_jalan')->onDelete('cascade');
            $table->uuid('alamat_id');
            $table->foreign('alamat_id')->references('id')->on('alamat')->onDelete('cascade');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('koordinat_jalan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('data_jalan_id');
            $table->foreign('data_jalan_id')->references('id')->on('data_jalan')->onDelete('cascade');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koordinat_jalan');
        Schema::dropIfExists('data_jalan');
        Schema::dropIfExists('alamat');
        Schema::dropIfExists('kondisi_jalan');
    }
};
