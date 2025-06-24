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
        Schema::create('dewan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jabatan', 50);
            $table->enum('satuan', ['Kamajaya', 'Kamaratih'])->nullable();
            $table->string('angkatan', 10)->nullable();
            $table->enum('keaktifan', ['Menjabat', 'Purna'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('nomer_hp', 20)->nullable();
            $table->string('sosial_media', 100)->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_anggota');
    }
};